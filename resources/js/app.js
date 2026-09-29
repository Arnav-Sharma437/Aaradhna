import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initMegaMenu();
    initMobileDrawer();
    initSearchModal();
    initCartBadge();
    initCartDrawer();
    initWishlist();
});

/**
 * 1. Mega Menu Desktop Interaction
 */
function initMegaMenu() {
    const navItem = document.getElementById('pooja-shop-nav-item');
    const megaMenu = document.getElementById('pooja-shop-mega-menu');
    const toggle = document.getElementById('pooja-shop-toggle');

    if (!navItem || !megaMenu) return;

    let timeoutId;

    const showMenu = () => {
        clearTimeout(timeoutId);
        megaMenu.classList.remove('invisible', 'opacity-0', 'translate-y-2', 'pointer-events-none');
        megaMenu.classList.add('opacity-100', 'translate-y-0');
        if (toggle) toggle.setAttribute('aria-expanded', 'true');
    };

    const hideMenu = () => {
        timeoutId = setTimeout(() => {
            megaMenu.classList.add('invisible', 'opacity-0', 'translate-y-2', 'pointer-events-none');
            megaMenu.classList.remove('opacity-100', 'translate-y-0');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
        }, 150);
    };

    navItem.addEventListener('mouseenter', showMenu);
    navItem.addEventListener('mouseleave', hideMenu);
    megaMenu.addEventListener('mouseenter', showMenu);
    megaMenu.addEventListener('mouseleave', hideMenu);
}

/**
 * 2. Mobile Drawer Navigation
 */
function initMobileDrawer() {
    const trigger = document.getElementById('mobile-menu-trigger');
    const drawer = document.getElementById('mobile-drawer');
    const overlay = document.getElementById('mobile-drawer-overlay');
    const closeBtn = document.getElementById('mobile-drawer-close');

    if (!trigger || !drawer || !overlay) return;

    const openDrawer = () => {
        drawer.classList.remove('-translate-x-full');
        drawer.classList.add('translate-x-0');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');
        document.body.classList.add('overflow-hidden');
    };

    const closeDrawer = () => {
        drawer.classList.add('-translate-x-full');
        drawer.classList.remove('translate-x-0');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        overlay.classList.remove('opacity-100');
        document.body.classList.remove('overflow-hidden');
    };

    trigger.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);

    const accordionToggles = document.querySelectorAll('.mobile-accordion-toggle');
    accordionToggles.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('svg');
            const isExpanded = btn.getAttribute('aria-expanded') === 'true';

            if (content) {
                content.classList.toggle('hidden');
                btn.setAttribute('aria-expanded', !isExpanded);
                if (icon) {
                    icon.classList.toggle('rotate-180', !isExpanded);
                }
            }
        });
    });
}

/**
 * 3. Predictive Search Modal
 */
function initSearchModal() {
    const trigger = document.getElementById('search-modal-trigger');
    const modal = document.getElementById('search-modal');
    const backdrop = document.getElementById('search-modal-backdrop');
    const closeBtn = document.getElementById('search-modal-close');
    const input = document.getElementById('predictive-search-input');

    if (!modal) return;

    const openModal = () => {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');
        document.body.classList.add('overflow-hidden');
        if (input) {
            setTimeout(() => input.focus(), 100);
        }
    };

    const closeModal = () => {
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.classList.remove('opacity-100');
        document.body.classList.remove('overflow-hidden');
    };

    if (trigger) trigger.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!modal.classList.contains('pointer-events-none')) {
                closeModal();
            }
        }
    });

    const tags = document.querySelectorAll('.search-tag');
    tags.forEach(tag => {
        tag.addEventListener('click', () => {
            if (input) {
                input.value = tag.textContent.trim();
                input.focus();
            }
        });
    });
}

/**
 * 4. Cart Badge Initialization
 */
function initCartBadge() {
    const badge = document.getElementById('header-cart-badge');
    if (!badge) return;

    window.addEventListener('cart:updated', (event) => {
        if (event.detail && typeof event.detail.count !== 'undefined') {
            badge.textContent = event.detail.count;
            badge.classList.remove('hidden');
        }
    });
}

/**
 * 5. Slide-Over Cart Drawer Controller
 */
function initCartDrawer() {
    const backdrop = document.getElementById('cart-drawer-backdrop');
    const panel = document.getElementById('cart-drawer-panel');
    const closeBtn = document.getElementById('cart-drawer-close');
    const triggers = document.querySelectorAll('#cart-drawer-trigger, .cart-drawer-opener');

    if (!backdrop || !panel) return;

    const openDrawer = (e) => {
        if (e) e.preventDefault();
        backdrop.classList.remove('opacity-0', 'pointer-events-none');
        backdrop.classList.add('opacity-100');
        panel.classList.remove('translate-x-full');
        panel.classList.add('translate-x-0');
        document.body.classList.add('overflow-hidden');
    };

    const closeDrawer = () => {
        panel.classList.add('translate-x-full');
        panel.classList.remove('translate-x-0');
        backdrop.classList.add('opacity-0', 'pointer-events-none');
        backdrop.classList.remove('opacity-100');
        document.body.classList.remove('overflow-hidden');
    };

    triggers.forEach(t => t.addEventListener('click', openDrawer));
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    backdrop.addEventListener('click', (e) => {
        if (e.target === backdrop) closeDrawer();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !backdrop.classList.contains('pointer-events-none')) {
            closeDrawer();
        }
    });

    // Handle Quick Add-to-cart clicks all across website to trigger drawer
    document.addEventListener('click', (e) => {
        const atcBtn = e.target.closest('.quick-add-to-cart-btn, #main-add-to-cart-btn, #sticky-atc-btn, .drawer-quick-add');
        if (atcBtn) {
            e.preventDefault();
            
            // Increment cart count
            const badge = document.getElementById('header-cart-badge');
            if (badge) {
                const current = parseInt(badge.textContent || '0') + 1;
                badge.textContent = current;
                window.dispatchEvent(new CustomEvent('cart:updated', { detail: { count: current } }));
            }

            // Open the slide-over drawer immediately
            setTimeout(() => {
                openDrawer();
            }, 150);
        }
    });

    // Drawer internal steppers & remove buttons
    const updateDrawerCalculations = () => {
        let subtotal = 0;
        const rows = document.querySelectorAll('.drawer-item-row');
        rows.forEach(r => {
            const p = parseFloat(r.dataset.price) || 0;
            const q = parseInt(r.querySelector('.drawer-qty-val')?.textContent) || 1;
            subtotal += (p * q);
        });

        const discount = Math.round(subtotal * 0.38);
        const grandTotal = Math.max(0, subtotal - discount);

        const subEl = document.getElementById('drawer-subtotal-val');
        const discEl = document.getElementById('drawer-discount-val');
        const totEl = document.getElementById('drawer-total-val');
        const countBadge = document.getElementById('drawer-item-count-badge');

        if (subEl) subEl.textContent = '₹' + subtotal.toFixed(2);
        if (discEl) discEl.textContent = '-₹' + discount.toFixed(2);
        if (totEl) totEl.textContent = '₹' + grandTotal.toFixed(2);
        if (countBadge) countBadge.textContent = '(' + rows.length + ')';
    };

    document.addEventListener('click', (e) => {
        if (e.target.closest('.drawer-qty-plus')) {
            const row = e.target.closest('.drawer-item-row');
            const qtyEl = row.querySelector('.drawer-qty-val');
            let q = parseInt(qtyEl.textContent) || 1;
            if (q < 99) qtyEl.textContent = q + 1;
            updateDrawerCalculations();
        }

        if (e.target.closest('.drawer-qty-minus')) {
            const row = e.target.closest('.drawer-item-row');
            const qtyEl = row.querySelector('.drawer-qty-val');
            let q = parseInt(qtyEl.textContent) || 1;
            if (q > 1) {
                qtyEl.textContent = q - 1;
                updateDrawerCalculations();
            }
        }

        if (e.target.closest('.drawer-remove-item')) {
            const row = e.target.closest('.drawer-item-row');
            if (row) {
                row.remove();
                updateDrawerCalculations();
            }
        }
    });
}

/**
 * 6. Wishlist Management (LocalStorage + UI Sync)
 */
function initWishlist() {
    const wishlistKey = 'aaradhna_wishlist';
    let savedItems = JSON.parse(localStorage.getItem(wishlistKey) || '["Devi Refill Pack", "Camphor Refill Pack", "Oudh Bambooless Sticks", "Chandan Cones"]');

    const updateWishlistBadge = () => {
        const badge = document.getElementById('header-wishlist-badge');
        if (badge) badge.textContent = savedItems.length;
    };

    updateWishlistBadge();

    document.addEventListener('click', (e) => {
        const wishBtn = e.target.closest('.wishlist-toggle-btn');
        if (wishBtn) {
            e.preventDefault();
            e.stopPropagation();

            const title = wishBtn.dataset.productTitle || 'Sacred Item';
            const icon = wishBtn.querySelector('svg');

            if (savedItems.includes(title)) {
                savedItems = savedItems.filter(item => item !== title);
                wishBtn.classList.remove('text-[#9B1C31]');
                wishBtn.classList.add('text-gray-400');
                if (icon) icon.setAttribute('fill', 'none');
            } else {
                savedItems.push(title);
                wishBtn.classList.add('text-[#9B1C31]');
                wishBtn.classList.remove('text-gray-400');
                if (icon) icon.setAttribute('fill', 'currentColor');
            }

            localStorage.setItem(wishlistKey, JSON.stringify(savedItems));
            updateWishlistBadge();
        }
    });
}
