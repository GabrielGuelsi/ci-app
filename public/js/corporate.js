// Corporate page JS
// Mobile nav and coming-soon toast are handled globally by app.blade.php

// Areas of Focus — tab switching
(function () {
    var tabs   = document.querySelectorAll('.co-focus-tab');
    var panels = document.querySelectorAll('.co-focus-panel');
    if (!tabs.length) { return; }

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var idx = tab.getAttribute('data-tab');

            tabs.forEach(function (t) {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            panels.forEach(function (p) { p.classList.remove('active'); });

            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');

            var activePanel = document.getElementById('co-focus-panel-' + idx);
            if (activePanel) { activePanel.classList.add('active'); }
        });
    });
}());
