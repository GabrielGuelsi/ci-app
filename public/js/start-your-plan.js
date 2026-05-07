(function () {
    'use strict';

    var form = document.getElementById('profileAssessment');
    if (!form) return;

    var config = window.SYP_CONFIG || {};
    var steps = Array.prototype.slice.call(form.querySelectorAll('.syp-step'));
    var totalSteps = steps.length;
    var currentIndex = 0;

    var elNext = document.getElementById('sypNext');
    var elBack = document.getElementById('sypBack');
    var elSubmit = document.getElementById('sypSubmit');
    var elProgress = document.getElementById('sypProgressFill');
    var elStepCurrent = document.getElementById('sypStepCurrent');
    var elStepTotal = document.getElementById('sypStepTotal');
    var elError = document.getElementById('sypError');
    var elSuccess = document.getElementById('sypSuccess');
    var elCareerSupport = document.getElementById('sypCareerSupport');

    if (elStepTotal) elStepTotal.textContent = totalSteps;

    function showStep(index) {
        steps.forEach(function (step, i) {
            step.hidden = i !== index;
        });
        elBack.hidden = index === 0;
        elNext.hidden = index === totalSteps - 1;
        elSubmit.hidden = index !== totalSteps - 1;
        if (elStepCurrent) elStepCurrent.textContent = index + 1;
        if (elProgress) elProgress.style.width = ((index + 1) / totalSteps * 100).toFixed(1) + '%';
        clearError();
        try { steps[index].scrollIntoView({ behavior: 'smooth', block: 'start' }); } catch (e) { /* ignore */ }
    }

    function validateStep(step) {
        clearError();
        var requiredRadios = step.querySelectorAll('input[type=radio][required]');
        var radioGroups = {};
        requiredRadios.forEach(function (input) { radioGroups[input.name] = false; });
        requiredRadios.forEach(function (input) {
            if (input.checked) radioGroups[input.name] = true;
        });
        for (var name in radioGroups) {
            if (!radioGroups[name]) {
                showError(translate('Please choose an option to continue.'));
                return false;
            }
        }

        var requiredFields = step.querySelectorAll('input[required], select[required], textarea[required]');
        for (var i = 0; i < requiredFields.length; i++) {
            var field = requiredFields[i];
            if (field.type === 'radio') continue;
            if (!field.value || !field.value.trim()) {
                field.classList.add('has-error');
                showError(translate('Please fill all required fields.'));
                return false;
            }
            field.classList.remove('has-error');
            if (field.type === 'email' && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(field.value)) {
                field.classList.add('has-error');
                showError(translate('Please provide a valid email address.'));
                return false;
            }
        }
        return true;
    }

    function showError(message) {
        if (!elError) return;
        elError.textContent = message;
        elError.hidden = false;
    }

    function clearError() {
        if (!elError) return;
        elError.hidden = true;
        elError.textContent = '';
    }

    function translate(text) {
        // Plain English fallback for the JS-driven messages.
        return text;
    }

    function updateCareerSupportVisibility() {
        if (!elCareerSupport) return;
        var triggers = form.querySelectorAll('input[name="support_type[]"][data-career-trigger="1"]');
        var anyChecked = false;
        triggers.forEach(function (input) { if (input.checked) anyChecked = true; });
        elCareerSupport.hidden = !anyChecked;
        if (!anyChecked) {
            // Clear any selections in the hidden sub-question.
            var subInputs = form.querySelectorAll('input[name="career_support[]"]');
            subInputs.forEach(function (input) { input.checked = false; });
        }
    }

    elNext.addEventListener('click', function () {
        var step = steps[currentIndex];
        if (!validateStep(step)) return;
        if (currentIndex < totalSteps - 1) {
            currentIndex++;
            showStep(currentIndex);
        }
    });

    elBack.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            showStep(currentIndex);
        }
    });

    form.addEventListener('change', function (event) {
        if (event.target.name === 'support_type[]') {
            updateCareerSupportVisibility();
        }
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        var step = steps[currentIndex];
        if (!validateStep(step)) return;

        var token = document.querySelector('meta[name="csrf-token"]');
        var csrf = token ? token.getAttribute('content') : '';

        var formData = new FormData(form);
        var payload = {};
        formData.forEach(function (value, key) {
            if (key === '_token') return;
            if (key.endsWith('[]')) {
                var clean = key.slice(0, -2);
                if (!payload[clean]) payload[clean] = [];
                payload[clean].push(value);
            } else {
                payload[key] = value;
            }
        });

        elSubmit.disabled = true;
        elSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + translate('Sending...');

        fetch(config.submitUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify(payload),
        })
            .then(function (response) {
                return response.json().then(function (data) { return { ok: response.ok, status: response.status, data: data }; });
            })
            .then(function (result) {
                if (!result.ok) {
                    var firstError = '';
                    if (result.data && result.data.errors) {
                        for (var k in result.data.errors) {
                            firstError = result.data.errors[k][0];
                            break;
                        }
                    }
                    showError(firstError || (result.data && result.data.message) || (config.genericError || translate('Something went wrong. Please try again.')));
                    elSubmit.disabled = false;
                    elSubmit.innerHTML = translate('Submit my plan') + ' <i class="fas fa-check"></i>';
                    return;
                }
                steps.forEach(function (s) { s.hidden = true; });
                document.querySelector('.syp-progress-bar').hidden = true;
                document.querySelector('.syp-progress-label').hidden = true;
                document.querySelector('.syp-actions').hidden = true;
                elSuccess.hidden = false;
                elSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });
            })
            .catch(function () {
                showError(config.genericError || translate('Something went wrong. Please try again.'));
                elSubmit.disabled = false;
                elSubmit.innerHTML = translate('Submit my plan') + ' <i class="fas fa-check"></i>';
            });
    });

    showStep(0);
})();
