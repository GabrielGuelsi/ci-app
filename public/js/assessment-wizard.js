/* =============================================================
   Profile Assessment Wizard Modal
   Reusable multi-step assessment opened from [data-open-assessment-modal].
   Submits to the data-submit-url defined on the modal element.
   ============================================================= */
(function () {
    'use strict';

    var modal = document.getElementById('assessmentWizardModal');
    if (!modal) return;

    var form = document.getElementById('assessmentWizardForm');
    if (!form) return;

    var cfg = {
        submitUrl: modal.getAttribute('data-submit-url'),
        genericError: modal.getAttribute('data-generic-error') || 'Something went wrong. Please try again.',
        errorChoose: modal.getAttribute('data-error-choose') || 'Please choose an option to continue.',
        errorRequired: modal.getAttribute('data-error-required') || 'Please fill all required fields.',
        errorEmail: modal.getAttribute('data-error-email') || 'Please provide a valid email address.',
        sendingLabel: modal.getAttribute('data-sending-label') || 'Sending...',
    };

    var steps = Array.prototype.slice.call(form.querySelectorAll('.syp-step'));
    var totalSteps = steps.length;
    var currentIndex = 0;
    var lastFocused = null;

    var elNext = document.getElementById('sypNext');
    var elBack = document.getElementById('sypBack');
    var elSubmit = document.getElementById('sypSubmit');
    var elProgress = document.getElementById('sypProgressFill');
    var elStepCurrent = document.getElementById('sypStepCurrent');
    var elStepTotal = document.getElementById('sypStepTotal');
    var elError = document.getElementById('sypError');
    var elSuccess = document.getElementById('sypSuccess');
    var elCareerSupport = document.getElementById('sypCareerSupport');
    var defaultSubmitLabel = elSubmit ? elSubmit.innerHTML : '';

    if (elStepTotal) elStepTotal.textContent = totalSteps;

    /* ---------- Modal open / close ---------- */
    function openModal(trigger) {
        lastFocused = trigger || document.activeElement;
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        window.setTimeout(function () {
            var firstField = steps[currentIndex] ? steps[currentIndex].querySelector('input, select') : null;
            if (firstField) firstField.focus();
        }, 80);
    }

    function closeModal() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        if (lastFocused && typeof lastFocused.focus === 'function') lastFocused.focus();
    }

    document.querySelectorAll('[data-open-assessment-modal]').forEach(function (trigger) {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(trigger);
        });
    });

    modal.addEventListener('click', function (event) {
        if (event.target === modal) closeModal();
    });

    modal.querySelectorAll('[data-close-assessment-modal]').forEach(function (btn) {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            closeModal();
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && modal.classList.contains('open')) closeModal();
    });

    /* ---------- Wizard step logic ---------- */
    function showStep(index) {
        steps.forEach(function (step, i) { step.hidden = i !== index; });
        if (elBack) elBack.hidden = index === 0;
        if (elNext) elNext.hidden = index === totalSteps - 1;
        if (elSubmit) elSubmit.hidden = index !== totalSteps - 1;
        if (elStepCurrent) elStepCurrent.textContent = index + 1;
        if (elProgress) elProgress.style.width = ((index + 1) / totalSteps * 100).toFixed(1) + '%';
        clearError();
        var box = modal.querySelector('.aw-box');
        if (box) { try { box.scrollTop = 0; } catch (e) { /* ignore */ } }
    }

    function validateStep(step) {
        clearError();
        var requiredRadios = step.querySelectorAll('input[type=radio][required]');
        var radioGroups = {};
        requiredRadios.forEach(function (input) { radioGroups[input.name] = false; });
        requiredRadios.forEach(function (input) { if (input.checked) radioGroups[input.name] = true; });
        for (var name in radioGroups) {
            if (!radioGroups[name]) {
                showError(cfg.errorChoose);
                return false;
            }
        }

        var requiredFields = step.querySelectorAll('input[required], select[required], textarea[required]');
        for (var i = 0; i < requiredFields.length; i++) {
            var field = requiredFields[i];
            if (field.type === 'radio') continue;
            if (!field.value || !field.value.trim()) {
                field.classList.add('has-error');
                showError(cfg.errorRequired);
                return false;
            }
            field.classList.remove('has-error');
            if (field.type === 'email' && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(field.value)) {
                field.classList.add('has-error');
                showError(cfg.errorEmail);
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

    function updateCareerSupportVisibility() {
        if (!elCareerSupport) return;
        var triggers = form.querySelectorAll('input[name="support_type[]"][data-career-trigger="1"]');
        var anyChecked = false;
        triggers.forEach(function (input) { if (input.checked) anyChecked = true; });
        elCareerSupport.hidden = !anyChecked;
        if (!anyChecked) {
            form.querySelectorAll('input[name="career_support[]"]').forEach(function (input) { input.checked = false; });
        }
    }

    if (elNext) {
        elNext.addEventListener('click', function () {
            var step = steps[currentIndex];
            if (!validateStep(step)) return;
            if (currentIndex < totalSteps - 1) {
                currentIndex++;
                showStep(currentIndex);
            }
        });
    }

    if (elBack) {
        elBack.addEventListener('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                showStep(currentIndex);
            }
        });
    }

    form.addEventListener('change', function (event) {
        if (event.target.name === 'support_type[]') updateCareerSupportVisibility();
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
        elSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + cfg.sendingLabel;

        fetch(cfg.submitUrl, {
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
                        for (var k in result.data.errors) { firstError = result.data.errors[k][0]; break; }
                    }
                    showError(firstError || (result.data && result.data.message) || cfg.genericError);
                    elSubmit.disabled = false;
                    elSubmit.innerHTML = defaultSubmitLabel;
                    return;
                }
                steps.forEach(function (s) { s.hidden = true; });
                var bar = form.querySelector('.syp-progress-bar');
                var label = form.querySelector('.syp-progress-label');
                var actions = form.querySelector('.syp-actions');
                if (bar) bar.hidden = true;
                if (label) label.hidden = true;
                if (actions) actions.hidden = true;
                if (elSuccess) {
                    elSuccess.hidden = false;
                    try { elSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' }); } catch (e) { /* ignore */ }
                }
            })
            .catch(function () {
                showError(cfg.genericError);
                elSubmit.disabled = false;
                elSubmit.innerHTML = defaultSubmitLabel;
            });
    });

    showStep(0);
})();
