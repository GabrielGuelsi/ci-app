(function () {
    const orbit = document.getElementById('teamOrbit');
    if (!orbit) {
        return;
    }

    const thumbs = Array.from(orbit.querySelectorAll('.orbit-thumb'));
    if (!thumbs.length) {
        return;
    }

    const centerPhoto = orbit.querySelector('.orbit-center-photo');
    const nameEl = orbit.querySelector('.orbit-center-name');
    const roleEl = orbit.querySelector('.orbit-center-role');
    const indexEl = orbit.querySelector('.orbit-index');
    const totalEl = orbit.querySelector('.orbit-total');

    const total = thumbs.length;
    let active = parseInt(orbit.dataset.active || '0', 10) || 0;

    const pad = (n) => String(n).padStart(2, '0');

    if (totalEl) {
        totalEl.textContent = pad(total);
    }

    // Ellipse geometry expressed as a percentage of the stage.
    const CX = 50;
    const CY = 50;
    const RX = 42;
    const RY = 37;

    function render() {
        const current = thumbs[active];

        if (centerPhoto) {
            centerPhoto.style.setProperty('--photo', current.style.getPropertyValue('--photo'));
        }
        if (nameEl) {
            nameEl.textContent = current.dataset.name || '';
        }
        if (roleEl) {
            roleEl.textContent = current.dataset.role || '';
        }
        if (indexEl) {
            indexEl.textContent = pad(active + 1);
        }

        const others = thumbs.filter((_, i) => i !== active);
        const count = others.length;

        // Spread the orbiting thumbnails across the top and sides only, leaving an
        // open wedge at the bottom-centre so no face sits on top of the name below.
        const gap = Math.PI * 0.55;
        const sweep = (Math.PI * 2) - gap;
        const start = (Math.PI / 2) + (gap / 2);

        others.forEach((thumb, k) => {
            const t = count > 1 ? k / (count - 1) : 0.5;
            const angle = start + t * sweep;
            thumb.style.left = (CX + RX * Math.cos(angle)) + '%';
            thumb.style.top = (CY + RY * Math.sin(angle)) + '%';
            thumb.style.transitionDelay = (k * 0.02) + 's';
            thumb.classList.remove('is-active');
            thumb.setAttribute('aria-pressed', 'false');
        });

        current.classList.add('is-active');
        current.setAttribute('aria-pressed', 'true');
    }

    function go(index) {
        active = ((index % total) + total) % total;
        render();
    }

    thumbs.forEach((thumb, i) => {
        thumb.addEventListener('click', () => go(i));
    });

    const prev = orbit.querySelector('.orbit-prev');
    const next = orbit.querySelector('.orbit-next');
    if (prev) {
        prev.addEventListener('click', () => go(active - 1));
    }
    if (next) {
        next.addEventListener('click', () => go(active + 1));
    }

    orbit.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            go(active - 1);
        } else if (e.key === 'ArrowRight') {
            go(active + 1);
        }
    });

    render();
})();
