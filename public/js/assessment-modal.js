/* =============================================================
   Profile Assessment Modal — quick lead capture
   Shared across pages (Study in Ireland, Already in Ireland, ...)
   ============================================================= */
(function () {
    'use strict';

    var modal = document.getElementById('profileAssessmentModal');
    if (!modal) return;

    var form = modal.querySelector('#profileAssessmentLeadForm');
    var status = modal.querySelector('#pa-form-status');
    var submitBtn = modal.querySelector('.modal-submit');
    var submitUrl = modal.getAttribute('data-submit-url');
    var defaultSubmitLabel = submitBtn ? submitBtn.innerHTML : '';
    var lastFocused = null;

    function open(trigger) {
        lastFocused = trigger || document.activeElement;
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        var firstField = modal.querySelector('input, select');
        if (firstField) {
            window.setTimeout(function () { firstField.focus(); }, 80);
        }
    }

    function close() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        if (lastFocused && typeof lastFocused.focus === 'function') {
            lastFocused.focus();
        }
    }

    function setStatus(message, kind) {
        if (!status) return;
        status.textContent = message || '';
        status.classList.remove('is-error', 'is-success');
        if (kind) status.classList.add('is-' + kind);
    }

    function clearFieldErrors() {
        if (!form) return;
        form.querySelectorAll('.has-error').forEach(function (el) {
            el.classList.remove('has-error');
        });
    }

    function validateLocally() {
        clearFieldErrors();
        if (!form) return false;
        var fields = form.querySelectorAll('input[required], select[required]');
        for (var i = 0; i < fields.length; i++) {
            var field = fields[i];
            if (!field.value || !field.value.trim()) {
                field.classList.add('has-error');
                field.focus();
                setStatus(form.dataset.errorRequired || 'Please complete all required fields.', 'error');
                return false;
            }
            if (field.type === 'email' && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(field.value)) {
                field.classList.add('has-error');
                field.focus();
                setStatus(form.dataset.errorEmail || 'Please provide a valid email address.', 'error');
                return false;
            }
        }
        return true;
    }

    document.querySelectorAll('[data-open-assessment-modal]').forEach(function (trigger) {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            open(trigger);
        });
    });

    modal.addEventListener('click', function (event) {
        if (event.target === modal) close();
    });

    modal.querySelectorAll('[data-close-assessment-modal]').forEach(function (btn) {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            close();
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && modal.classList.contains('open')) close();
    });

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (!validateLocally()) return;

            var tokenMeta = document.querySelector('meta[name="csrf-token"]');
            var csrf = tokenMeta ? tokenMeta.getAttribute('content') : '';

            var formData = new FormData(form);
            var payload = {};
            formData.forEach(function (value, key) {
                if (key === '_token') return;
                payload[key] = value;
            });

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + (form.dataset.sendingLabel || 'Sending...');
            }
            setStatus('', null);

            fetch(submitUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify(payload),
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        return { ok: response.ok, status: response.status, data: data };
                    });
                })
                .then(function (result) {
                    if (!result.ok) {
                        var firstError = '';
                        if (result.data && result.data.errors) {
                            for (var key in result.data.errors) {
                                firstError = result.data.errors[key][0];
                                var input = form.querySelector('[name="' + key + '"]');
                                if (input) input.classList.add('has-error');
                                break;
                            }
                        }
                        setStatus(firstError || (result.data && result.data.message) || (form.dataset.errorGeneric || 'Something went wrong. Please try again.'), 'error');
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = defaultSubmitLabel;
                        }
                        return;
                    }
                    form.reset();
                    setStatus((result.data && result.data.message) || 'Thank you. Our team will be in touch soon.', 'success');
                    if (submitBtn) {
                        submitBtn.innerHTML = defaultSubmitLabel;
                        submitBtn.disabled = true;
                    }
                })
                .catch(function () {
                    setStatus(form.dataset.errorGeneric || 'Something went wrong. Please try again.', 'error');
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = defaultSubmitLabel;
                    }
                });
        });
    }
})();
