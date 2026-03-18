// ── Flowing Menu ──
function initFlowingMenu() {
    const items = document.querySelectorAll('.fm-item');
    if (!items.length || typeof gsap === 'undefined') { return; }

    items.forEach(item => {
        const link    = item.querySelector('.fm-item-link');
        const marquee = item.querySelector('.fm-marquee');
        const inner   = item.querySelector('.fm-marquee-inner');
        const images  = item.dataset.images
            ? item.dataset.images.split(',').map(value => value.trim()).filter(Boolean)
            : [item.dataset.image].filter(Boolean);
        const name    = item.querySelector('.fm-dest-name').textContent.trim();

        buildMarqueeParts(inner, name, images);

        requestAnimationFrame(() => {
            startMarqueeScroll(inner);
        });

        item.addEventListener('mouseenter', e => fmOnEnter(e, item, marquee));
        item.addEventListener('mouseleave', e => fmOnLeave(e, item, marquee));
    });
}

function buildMarqueeParts(inner, text, images) {
    const partsPerSet = Math.ceil(window.innerWidth / 220) + 3;
    const totalParts = partsPerSet * 2;
    const parts = Array.from({ length: totalParts }, (_, index) => {
        const image = images[index % images.length];
        return `<div class="fm-part">
            <span>${text}</span>
            <div class="fm-img" style="background-image:url('${image}')"></div>
        </div>`;
    });
    inner.innerHTML = parts.join('');
}

function startMarqueeScroll(inner) {
    const halfWidth = inner.scrollWidth / 2;
    let x = 0;

    function tick() {
        x -= 1.4;
        if (x <= -halfWidth) { x = 0; }
        inner.style.transform = `translateX(${x}px)`;
        requestAnimationFrame(tick);
    }

    requestAnimationFrame(tick);
}

function fmClosestEdge(mouseX, mouseY, width, height) {
    const distTop    = mouseY * mouseY;
    const distBottom = (mouseY - height) * (mouseY - height);
    return distTop < distBottom ? 'top' : 'bottom';
}

function fmOnEnter(e, item, marquee) {
    const r    = item.getBoundingClientRect();
    const edge = fmClosestEdge(e.clientX - r.left, e.clientY - r.top, r.width, r.height);

    gsap.killTweensOf(marquee);
    gsap.fromTo(marquee,
        { y: edge === 'top' ? '-101%' : '101%' },
        { y: '0%', duration: 0.55, ease: 'expo.out' }
    );
}

function fmOnLeave(e, item, marquee) {
    const r    = item.getBoundingClientRect();
    const edge = fmClosestEdge(e.clientX - r.left, e.clientY - r.top, r.width, r.height);

    gsap.killTweensOf(marquee);
    gsap.to(marquee, {
        y: edge === 'top' ? '-101%' : '101%',
        duration: 0.55,
        ease: 'expo.in'
    });
}

document.addEventListener('DOMContentLoaded', initFlowingMenu);

// ── Panel switcher ──
function switchPanel(panel) {
    document.querySelectorAll('.tj-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tj-toggle-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('panel-' + panel).classList.add('active');
    document.getElementById('btn-' + panel).classList.add('active');
}

// ── Modal ──
function toggleSchoolField(radio) {
    const wrapper = document.getElementById('schoolFieldWrapper');
    const field   = document.getElementById('schoolField');
    if (!wrapper) return;
    const show = radio.value === 'school';
    wrapper.style.display = show ? 'flex' : 'none';
    if (field) { field.required = show; }
}

function openTeensModal(direction) {
    const modal = document.getElementById('teensModal');
    if (!modal) return;
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';

    if (direction === 'outbound') {
        const radio = modal.querySelector('input[name="direction"][value="outbound"]');
        if (radio) { radio.checked = true; }
    } else if (direction === 'inbound') {
        const radio = modal.querySelector('input[name="direction"][value="inbound"]');
        if (radio) { radio.checked = true; }
    }
}

function closeTeensModal() {
    const modal = document.getElementById('teensModal');
    if (!modal) return;
    modal.classList.remove('open');
    document.body.style.overflow = '';
}

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('teensModal');
    if (modal) {
        modal.addEventListener('click', e => {
            if (e.target === modal) { closeTeensModal(); }
        });
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') { closeTeensModal(); }
    });
});
