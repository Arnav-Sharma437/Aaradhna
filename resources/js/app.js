import './bootstrap';

/**
 * =========================================================================
 * MANGALAM.CO™ - UNIFIED CLIENT-SIDE STATE MANAGEMENT & REACTIVE STORE
 * =========================================================================
 * Pure, reliable LocalStorage management for Cart & Wishlist with zero phantom
 * initial data, persistent cross-page sync, reactive button states, and accurate calculations.
 */

const CART_STORAGE_KEY = 'mangalam_cart_items_v2';
const WISHLIST_STORAGE_KEY = 'mangalam_wishlist_items_v2';

let activeCouponDiscount = 0; // percentage e.g. 0.10

// -------------------------------------------------------------------------
// 1. Core State Helpers
// -------------------------------------------------------------------------
export const getCart = () => {
    try {
        const stored = localStorage.getItem(CART_STORAGE_KEY);
        return stored ? JSON.parse(stored) : [];
    } catch (e) {
        return [];
    }
};

export const saveCart = (items) => {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(items));
    window.dispatchEvent(new CustomEvent('mangalam:cart-updated', { detail: { items } }));
};

export const clearCart = () => {
    localStorage.removeItem(CART_STORAGE_KEY);
    window.dispatchEvent(new CustomEvent('mangalam:cart-updated', { detail: { items: [] } }));
};

export const getWishlist = () => {
    try {
        const stored = localStorage.getItem(WISHLIST_STORAGE_KEY);
        return stored ? JSON.parse(stored) : [];
    } catch (e) {
        return [];
    }
};

export const saveWishlist = (items) => {
    localStorage.setItem(WISHLIST_STORAGE_KEY, JSON.stringify(items));
    window.dispatchEvent(new CustomEvent('mangalam:wishlist-updated', { detail: { items } }));
};

// -------------------------------------------------------------------------
// 2. Cart Operations
// -------------------------------------------------------------------------
export const addToCart = (product, quantity = 1) => {
    const cart = getCart();
    const existingIndex = cart.findIndex(item => item.title === product.title || (item.slug && item.slug === product.slug && item.id === product.id));
    
    if (existingIndex > -1) {
        cart[existingIndex].quantity += quantity;
    } else {
        cart.push({
            id: product.id || Date.now(),
            title: product.title || 'Sacred Item',
            slug: product.slug || '',
            price: parseFloat(product.price) || 489.00,
            image: product.image || '/assets/images/devi-refill-pack-card.jpg',
            quantity: quantity,
            packInfo: product.packInfo || 'Pack of 100 sticks'
        });
    }
    
    saveCart(cart);
    return cart;
};

export const updateCartItemQuantity = (titleOrSlug, newQty) => {
    let cart = getCart();
    if (newQty <= 0) {
        cart = cart.filter(item => item.title !== titleOrSlug && item.slug !== titleOrSlug && item.id !== titleOrSlug);
    } else {
        const item = cart.find(item => item.title === titleOrSlug || item.slug === titleOrSlug || item.id === titleOrSlug);
        if (item) item.quantity = newQty;
    }
    saveCart(cart);
    return cart;
};

export const removeFromCart = (titleOrSlug) => {
    let cart = getCart().filter(item => item.title !== titleOrSlug && item.slug !== titleOrSlug && item.id !== titleOrSlug);
    saveCart(cart);
    return cart;
};

// -------------------------------------------------------------------------
// 3. Wishlist Operations
// -------------------------------------------------------------------------
export const toggleWishlistItem = (product) => {
    let list = getWishlist();
    const exists = list.some(item => (typeof item === 'string' && item === product.title) || item.title === product.title || (item.slug && item.slug === product.slug));
    
    if (exists) {
        list = list.filter(item => {
            if (typeof item === 'string') return item !== product.title;
            return item.title !== product.title && item.slug !== product.slug;
        });
    } else {
        list.push({
            id: product.id || Date.now(),
            title: product.title || 'Sacred Samagri',
            slug: product.slug || '',
            price: parseFloat(product.price) || 489.00,
            image: product.image || '/assets/images/devi-refill-pack-card.jpg',
            packInfo: product.packInfo || '100 sticks'
        });
    }
    
    saveWishlist(list);
    return !exists;
};

export const removeFromWishlist = (titleOrSlug) => {
    let list = getWishlist().filter(item => {
        if (typeof item === 'string') return item !== titleOrSlug;
        return item.title !== titleOrSlug && item.slug !== titleOrSlug;
    });
    saveWishlist(list);
    return list;
};

export const isInWishlist = (titleOrSlug) => {
    const list = getWishlist();
    return list.some(item => {
        if (typeof item === 'string') return item === titleOrSlug;
        return item.title === titleOrSlug || item.slug === titleOrSlug;
    });
};

// -------------------------------------------------------------------------
// 4. UI Synchronization (Badges, Buttons, Drawer, Pages)
// -------------------------------------------------------------------------
function updateHeaderBadges() {
    const cart = getCart();
    const totalCartCount = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
    const cartBadge = document.getElementById('header-cart-badge');
    if (cartBadge) {
        cartBadge.textContent = totalCartCount;
    }
}

function renderCartDrawer() {
    const container = document.getElementById('drawer-items-list');
    if (!container) return;

    const cart = getCart();
    const countBadge = document.getElementById('drawer-item-count-badge');
    if (countBadge) countBadge.textContent = `(${cart.length})`;

    if (cart.length === 0) {
        container.innerHTML = `
            <div class="py-12 px-4 text-center space-y-3 font-body">
                <div class="w-14 h-14 mx-auto bg-[#FAF7F2] rounded-full flex items-center justify-center text-[#D38928] text-2xl">
                    🛍️
                </div>
                <h4 class="text-base font-bold font-heading text-[#121212]">Your Cart is Empty</h4>
                <p class="text-xs text-gray-500 max-w-[240px] mx-auto">
                    Add pure bambooless incense, havan cups, or festive bundles to begin.
                </p>
            </div>
        `;
    } else {
        container.innerHTML = cart.map(item => `
            <div class="drawer-item-row flex items-center space-x-3 bg-white p-3 rounded-[12px] border border-[#EADBCC] shadow-2xs font-body" data-title="${item.title}" data-slug="${item.slug}" data-price="${item.price}">
                <div class="w-16 h-16 rounded-[8px] bg-[#FAF7F2] overflow-hidden shrink-0 border border-[#EADBCC]">
                    <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 min-w-0 space-y-1">
                    <div class="flex items-start justify-between">
                        <h4 class="text-xs sm:text-sm font-bold font-serif text-[#121212] truncate">${item.title}</h4>
                        <button type="button" class="drawer-remove-item text-gray-400 hover:text-[#9B1C31] p-1 transition-colors cursor-pointer" data-title="${item.title}" aria-label="Remove item">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <div class="text-[11px] text-gray-500 font-medium truncate">${item.packInfo || '100 sticks'}</div>
                    <div class="flex items-center justify-between pt-1">
                        <div class="flex items-center border border-[#EADBCC] rounded-[6px] bg-white overflow-hidden text-xs">
                            <button type="button" class="drawer-qty-minus px-2 py-0.5 text-gray-600 hover:bg-gray-100 font-bold" data-title="${item.title}">−</button>
                            <span class="drawer-qty-val px-2.5 py-0.5 font-bold text-[#121212]">${item.quantity}</span>
                            <button type="button" class="drawer-qty-plus px-2 py-0.5 text-gray-600 hover:bg-gray-100 font-bold" data-title="${item.title}">+</button>
                        </div>
                        <div class="text-xs sm:text-sm font-black font-heading text-[#C87A1E]">
                            ₹${(item.price * item.quantity).toFixed(2)}
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Accurate Calculations (No phantom 38% deductions)
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const discount = activeCouponDiscount > 0 ? (subtotal * activeCouponDiscount) : 0;
    const grandTotal = Math.max(0, subtotal - discount);

    const subEl = document.getElementById('drawer-subtotal-val');
    const discEl = document.getElementById('drawer-discount-val');
    const totEl = document.getElementById('drawer-total-val');
    const thresholdText = document.getElementById('drawer-threshold-text');
    const milestoneFill = document.getElementById('drawer-milestone-fill');

    if (subEl) subEl.textContent = '₹' + subtotal.toFixed(2);
    if (discEl) discEl.textContent = '-₹' + discount.toFixed(2);
    if (totEl) totEl.textContent = '₹' + grandTotal.toFixed(2);

    if (subtotal >= 499) {
        if (thresholdText) thresholdText.innerHTML = '🎉 You unlocked <strong class="underline font-black">Free Shipping & Festive Benefits!</strong>';
        if (milestoneFill) milestoneFill.style.width = '100%';
    } else {
        const remaining = (499 - subtotal).toFixed(0);
        if (thresholdText) thresholdText.innerHTML = `Add items worth ₹${remaining} to Unlock <strong class="underline font-black">Free Delivery</strong>`;
        const pct = Math.min(100, Math.round((subtotal / 499) * 100));
        if (milestoneFill) milestoneFill.style.width = `${pct}%`;
    }
}



function renderCartPage() {
    const container = document.getElementById('cart-items-container');
    const emptyState = document.getElementById('cart-empty-state');
    if (!container) return;

    const cart = getCart();

    if (cart.length === 0) {
        container.classList.add('hidden');
        if (emptyState) emptyState.classList.remove('hidden');
    } else {
        container.classList.remove('hidden');
        if (emptyState) emptyState.classList.add('hidden');

        container.innerHTML = cart.map(item => `
            <div class="cart-item-row p-4 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 font-body" data-title="${item.title}" data-price="${item.price}">
                <div class="flex items-center space-x-4 min-w-0">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-[14px] bg-[#FAF7F2] border border-[#EADBCC] overflow-hidden shrink-0">
                        <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-1 min-w-0">
                        <h3 class="text-base sm:text-lg font-bold font-serif text-[#121212] truncate">
                            <a href="${item.slug ? '/products/' + item.slug : '#'}" class="hover:text-[#D38928] transition-colors">${item.title}</a>
                        </h3>
                        <p class="text-xs text-gray-500">${item.packInfo || '100 sticks'}</p>
                        <div class="text-xs sm:text-sm font-black text-[#C87A1E] font-heading">
                            ₹${item.price.toFixed(2)}
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between sm:justify-end sm:space-x-6 pt-2 sm:pt-0 border-t sm:border-0 border-gray-100">
                    <div class="flex items-center border border-[#EADBCC] rounded-[10px] bg-white overflow-hidden">
                        <button type="button" class="cart-page-qty-minus px-3.5 py-2 text-gray-500 hover:text-[#121212] font-bold text-base cursor-pointer" data-title="${item.title}">−</button>
                        <input type="number" class="cart-item-qty w-10 text-center text-xs sm:text-sm font-bold border-none focus:ring-0 p-0 text-[#121212]" value="${item.quantity}" readonly>
                        <button type="button" class="cart-page-qty-plus px-3.5 py-2 text-gray-500 hover:text-[#121212] font-bold text-base cursor-pointer" data-title="${item.title}">+</button>
                    </div>
                    <div class="text-right min-w-[90px]">
                        <span class="cart-row-total text-base sm:text-lg font-black font-heading text-[#121212]">
                            ₹${(item.price * item.quantity).toFixed(2)}
                        </span>
                    </div>
                    <button type="button" class="cart-page-remove-btn text-gray-400 hover:text-[#9B1C31] p-2 transition-colors cursor-pointer" data-title="${item.title}" aria-label="Remove item">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            </div>
        `).join('');
    }

    // Accurate Price Calculations
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const discount = activeCouponDiscount > 0 ? (subtotal * activeCouponDiscount) : 0;
    const grandTotal = Math.max(0, subtotal - discount);

    const subEl = document.getElementById('summary-subtotal');
    const discEl = document.getElementById('summary-discount');
    const grandEl = document.getElementById('summary-grand-total');
    const shippingProgress = document.getElementById('shipping-progress-bar');
    const shippingMsg = document.getElementById('free-shipping-msg');

    if (subEl) subEl.textContent = '₹' + subtotal.toFixed(2);
    if (discEl) discEl.textContent = '-₹' + discount.toFixed(2);
    if (grandEl) grandEl.textContent = '₹' + grandTotal.toFixed(2);

    if (subtotal >= 499) {
        if (shippingProgress) shippingProgress.style.width = '100%';
        if (shippingMsg) shippingMsg.textContent = '🎉 You have unlocked FREE Standard Shipping!';
    } else {
        const diff = (499 - subtotal).toFixed(2);
        const pct = Math.min(100, Math.round((subtotal / 499) * 100));
        if (shippingProgress) shippingProgress.style.width = pct + '%';
        if (shippingMsg) shippingMsg.textContent = 'Add ₹' + diff + ' more to unlock FREE Standard Shipping!';
    }
}

// -------------------------------------------------------------------------
// 5. Global Window API & Initialization
// -------------------------------------------------------------------------
window.CartStore = {
    getCart,
    saveCart,
    clearCart,
    addItem: (item) => addToCart(item, item.quantity || 1),
    updateQuantity: updateCartItemQuantity,
    removeItem: removeFromCart,
    openDrawer: openCartDrawer,
    closeDrawer: closeCartDrawer
};

document.addEventListener('DOMContentLoaded', () => {
    initMegaMenu();
    initMobileDrawer();
    initSearchModal();
    initScrollReveal();
    initCartDrawerUI();
    initCheckoutModal();
    
    // Initial Render
    updateHeaderBadges();
    renderCartDrawer();
    renderCartPage();

    // Listen to custom store events
    window.addEventListener('mangalam:cart-updated', () => {
        updateHeaderBadges();
        renderCartDrawer();
        renderCartPage();
    });

    // Delegated click handler for Add-To-Cart across all pages
    document.addEventListener('click', (e) => {
        const atcBtn = e.target.closest('.quick-add-to-cart-btn, #main-add-to-cart-btn, #sticky-atc-btn, .drawer-quick-add');
        if (atcBtn) {
            e.preventDefault();
            e.stopPropagation();

            const product = {
                id: atcBtn.dataset.productId || Date.now(),
                title: atcBtn.dataset.productTitle || atcBtn.dataset.title || 'Sacred Item',
                slug: atcBtn.dataset.productSlug || '',
                price: parseFloat(atcBtn.dataset.productPrice || atcBtn.dataset.price) || 489.00,
                image: atcBtn.dataset.productImage || '/assets/images/devi-refill-pack-card.jpg',
            };

            const qtyInput = document.getElementById('product-quantity');
            const qty = (atcBtn.id === 'main-add-to-cart-btn' || atcBtn.id === 'sticky-atc-btn') && qtyInput ? (parseInt(qtyInput.value) || 1) : 1;

            addToCart(product, qty);

            // Directly open the luxury Cart Drawer immediately
            openCartDrawer();
        }

        // Drawer Controls
        if (e.target.closest('.drawer-qty-plus')) {
            const title = e.target.closest('.drawer-qty-plus').dataset.title;
            const cart = getCart();
            const item = cart.find(i => i.title === title);
            if (item) updateCartItemQuantity(title, item.quantity + 1);
        }

        if (e.target.closest('.drawer-qty-minus')) {
            const title = e.target.closest('.drawer-qty-minus').dataset.title;
            const cart = getCart();
            const item = cart.find(i => i.title === title);
            if (item && item.quantity > 1) updateCartItemQuantity(title, item.quantity - 1);
            else if (item) removeFromCart(title);
        }

        if (e.target.closest('.drawer-remove-item')) {
            const title = e.target.closest('.drawer-remove-item').dataset.title;
            removeFromCart(title);
        }

        // Full Product Card Clickable Navigation (anywhere on card navigates to product page)
        const productCard = e.target.closest('.product-card');
        if (productCard && !e.target.closest('button') && !e.target.closest('input') && !e.target.closest('.quick-add-to-cart-btn')) {
            const link = productCard.querySelector('a[href]');
            if (link && link.href) {
                // If user didn't click directly on the link, navigate to the link's href
                if (!e.target.closest('a')) {
                    window.location.href = link.href;
                }
            }
        }

        // Full Category Circle Card Clickable Navigation
        const categoryCard = e.target.closest('.group');
        if (categoryCard && !e.target.closest('button') && !e.target.closest('input')) {
            const link = categoryCard.querySelector('a[href*="/collections/"], a[href*="/products/"]');
            if (link && link.href && !e.target.closest('a')) {
                window.location.href = link.href;
            }
        }

        // Cart Page Controls
        if (e.target.closest('.cart-page-qty-plus')) {
            const title = e.target.closest('.cart-page-qty-plus').dataset.title;
            const cart = getCart();
            const item = cart.find(i => i.title === title);
            if (item) updateCartItemQuantity(title, item.quantity + 1);
        }

        if (e.target.closest('.cart-page-qty-minus')) {
            const title = e.target.closest('.cart-page-qty-minus').dataset.title;
            const cart = getCart();
            const item = cart.find(i => i.title === title);
            if (item && item.quantity > 1) updateCartItemQuantity(title, item.quantity - 1);
            else if (item) removeFromCart(title);
        }

        if (e.target.closest('.cart-page-remove-btn')) {
            const title = e.target.closest('.cart-page-remove-btn').dataset.title;
            removeFromCart(title);
        }
    });

    // Coupon Code on Cart Page with Server-Side Validation
    const applyCouponBtn = document.getElementById('apply-coupon-btn');
    const couponInput = document.getElementById('coupon-code-input');
    const couponFeedback = document.getElementById('coupon-feedback');

    if (applyCouponBtn && couponInput) {
        // Real-time reset if user clears the input box
        couponInput.addEventListener('input', () => {
            if (!couponInput.value.trim()) {
                activeCouponDiscount = 0;
                if (couponFeedback) {
                    couponFeedback.textContent = '';
                    couponFeedback.classList.add('hidden');
                }
                renderCartPage();
                renderCartDrawer();
            }
        });

        applyCouponBtn.addEventListener('click', async () => {
            const code = couponInput.value.trim().toUpperCase();
            if (!code) {
                activeCouponDiscount = 0;
                if (couponFeedback) {
                    couponFeedback.textContent = 'Please enter a coupon code.';
                    couponFeedback.classList.remove('hidden', 'text-emerald-700');
                    couponFeedback.classList.add('text-rose-600');
                }
                renderCartPage();
                renderCartDrawer();
                return;
            }

            const cart = getCart();
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

            applyCouponBtn.disabled = true;
            applyCouponBtn.innerHTML = '<span class="inline-block animate-spin">⌛</span> Checking...';

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                const response = await fetch('/api/coupons/validate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken || ''
                    },
                    body: JSON.stringify({
                        code: code,
                        subtotal: subtotal
                    })
                });

                const data = await response.json();

                if (response.ok && data.valid) {
                    if (data.type === 'percentage') {
                        activeCouponDiscount = (data.value || 10) / 100;
                    } else if (data.type === 'fixed_amount' && subtotal > 0) {
                        activeCouponDiscount = (data.discount_amount || 0) / subtotal;
                    } else {
                        activeCouponDiscount = 0.10;
                    }

                    if (couponFeedback) {
                        couponFeedback.textContent = `✓ ${data.message || 'Coupon applied successfully!'}`;
                        couponFeedback.classList.remove('hidden', 'text-rose-600');
                        couponFeedback.classList.add('text-emerald-700');
                    }
                } else {
                    // Strictly zero out discount on invalid or expired code
                    activeCouponDiscount = 0;
                    if (couponFeedback) {
                        couponFeedback.textContent = `✕ ${data.message || 'Invalid or unknown coupon code.'}`;
                        couponFeedback.classList.remove('hidden', 'text-emerald-700');
                        couponFeedback.classList.add('text-rose-600');
                    }
                }
            } catch (err) {
                activeCouponDiscount = 0;
                if (couponFeedback) {
                    couponFeedback.textContent = `✕ Invalid or expired coupon code.`;
                    couponFeedback.classList.remove('hidden', 'text-emerald-700');
                    couponFeedback.classList.add('text-rose-600');
                }
            } finally {
                applyCouponBtn.disabled = false;
                applyCouponBtn.textContent = 'Apply';
                renderCartPage();
                renderCartDrawer();
            }
        });
    }
});

// -------------------------------------------------------------------------
// 6. Checkout Modal & Order Placement
// -------------------------------------------------------------------------
function initCheckoutModal() {
    const modalBackdrop = document.getElementById('checkout-modal-backdrop');
    const checkoutTrigger = document.getElementById('checkout-trigger-btn');
    const closeBtn = document.getElementById('close-checkout-modal-btn');
    const form = document.getElementById('express-checkout-form');
    const payableEl = document.getElementById('modal-payable-total');
    const formContainer = document.getElementById('checkout-form-container');
    const successContainer = document.getElementById('checkout-success-container');
    const successOrderId = document.getElementById('success-order-id');

    if (!modalBackdrop) return;

    const openCheckout = () => {
        const cart = getCart();
        if (cart.length === 0) {
            alert('Your basket is empty. Please add items before checking out.');
            return;
        }

        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const discount = activeCouponDiscount > 0 ? (subtotal * activeCouponDiscount) : 0;
        const total = Math.max(0, subtotal - discount);

        if (payableEl) payableEl.textContent = '₹' + total.toFixed(2);
        if (formContainer) formContainer.classList.remove('hidden');
        if (successContainer) successContainer.classList.add('hidden');

        modalBackdrop.classList.remove('hidden');
        modalBackdrop.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeCheckout = () => {
        modalBackdrop.classList.add('hidden');
        modalBackdrop.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    if (checkoutTrigger) checkoutTrigger.addEventListener('click', openCheckout);
    if (closeBtn) closeBtn.addEventListener('click', closeCheckout);
    modalBackdrop.addEventListener('click', (e) => {
        if (e.target === modalBackdrop) closeCheckout();
    });

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const orderId = 'MGLM-' + Math.floor(10000 + Math.random() * 90000);
            if (successOrderId) successOrderId.textContent = '#' + orderId;
            
            clearCart();
            if (formContainer) formContainer.classList.add('hidden');
            if (successContainer) successContainer.classList.remove('hidden');
        });
    }
}

// -------------------------------------------------------------------------
// 7. Slide-Over Cart Drawer UI Functions
// -------------------------------------------------------------------------
function openCartDrawer() {
    const backdrop = document.getElementById('cart-drawer-backdrop');
    const panel = document.getElementById('cart-drawer-panel');
    if (!backdrop || !panel) return;

    backdrop.classList.remove('opacity-0', 'pointer-events-none');
    backdrop.classList.add('opacity-100');
    panel.classList.remove('translate-x-full');
    panel.classList.add('translate-x-0');
    document.body.classList.add('overflow-hidden');
}

function closeCartDrawer() {
    const backdrop = document.getElementById('cart-drawer-backdrop');
    const panel = document.getElementById('cart-drawer-panel');
    if (!backdrop || !panel) return;

    panel.classList.add('translate-x-full');
    panel.classList.remove('translate-x-0');
    backdrop.classList.add('opacity-0', 'pointer-events-none');
    backdrop.classList.remove('opacity-100');
    document.body.classList.remove('overflow-hidden');
}

function initCartDrawerUI() {
    const backdrop = document.getElementById('cart-drawer-backdrop');
    const closeBtn = document.getElementById('cart-drawer-close');
    const triggers = document.querySelectorAll('#cart-drawer-trigger, #header-cart-trigger, #mobile-app-cart-trigger, .cart-drawer-opener');

    triggers.forEach(t => t.addEventListener('click', (e) => {
        e.preventDefault();
        openCartDrawer();
    }));

    if (closeBtn) closeBtn.addEventListener('click', closeCartDrawer);
    if (backdrop) {
        backdrop.addEventListener('click', (e) => {
            if (e.target === backdrop) closeCartDrawer();
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && backdrop && !backdrop.classList.contains('pointer-events-none')) {
            closeCartDrawer();
        }
    });
}

// -------------------------------------------------------------------------
// 8. Navigation MegaMenu, Mobile Drawer, Predictive Search
// -------------------------------------------------------------------------
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
}

function initSearchModal() {
    const modal = document.getElementById('search-modal');
    const backdrop = document.getElementById('search-modal-backdrop');
    const closeBtn = document.getElementById('search-modal-close');
    const input = document.getElementById('predictive-search-input');
    const spinner = document.getElementById('search-spinner');
    const resultsContainer = document.getElementById('predictive-results-container');
    const resultsCountLabel = document.getElementById('results-count-label');
    const resultsHeaderTitle = document.getElementById('results-header-title');
    const categoriesSection = document.getElementById('search-categories-section');
    const categoriesContainer = document.getElementById('search-categories-container');
    const popularSearchesBox = document.getElementById('popular-searches-box');
    const emptyState = document.getElementById('search-empty-state');

    if (!modal) return;

    let debounceTimer;

    const openModal = () => {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');
        document.body.classList.add('overflow-hidden');
        if (input) {
            setTimeout(() => {
                if (window.innerWidth >= 768) {
                    input.focus();
                }
                if (!input.value.trim()) {
                    performSearch('');
                }
            }, 100);
        }
    };

    const closeModal = () => {
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.classList.remove('opacity-100');
        document.body.classList.remove('overflow-hidden');
    };

    document.querySelectorAll('#search-modal-trigger, #mobile-app-search-trigger, .search-modal-opener').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            openModal();
        });
    });

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('pointer-events-none')) {
            closeModal();
        }
    });

    async function performSearch(query) {
        if (spinner) spinner.classList.remove('hidden');

        try {
            const res = await fetch(`/api/search/predictive?q=${encodeURIComponent(query)}`);
            const data = await res.json();

            if (spinner) spinner.classList.add('hidden');

            const hasQuery = query.length > 0;

            if (popularSearchesBox) {
                popularSearchesBox.style.display = hasQuery ? 'none' : 'block';
            }

            if (resultsHeaderTitle) {
                resultsHeaderTitle.textContent = hasQuery ? `Results for "${query}"` : 'Featured Products';
            }

            if (resultsCountLabel) {
                if (hasQuery && data.total > 0) {
                    resultsCountLabel.textContent = `${data.total} item${data.total === 1 ? '' : 's'}`;
                    resultsCountLabel.classList.remove('hidden');
                } else {
                    resultsCountLabel.classList.add('hidden');
                }
            }

            if (categoriesSection && categoriesContainer) {
                if (data.categories && data.categories.length > 0) {
                    categoriesSection.classList.remove('hidden');
                    categoriesContainer.innerHTML = data.categories.map(c => `
                        <a href="${c.url}" class="px-3 py-1.5 bg-[#FAF7F2] text-xs font-bold text-[#D38928] rounded-full border border-[#EADBCC] hover:bg-[#D38928] hover:text-white transition-colors">
                            📁 ${c.name}
                        </a>
                    `).join('');
                } else {
                    categoriesSection.classList.add('hidden');
                    categoriesContainer.innerHTML = '';
                }
            }

            if (data.products && data.products.length > 0) {
                if (emptyState) emptyState.classList.add('hidden');
                if (resultsContainer) {
                    resultsContainer.classList.remove('hidden');
                    resultsContainer.innerHTML = data.products.map(p => `
                        <a href="${p.url}" class="flex items-center p-3 rounded-[12px] border border-[#EADBCC] hover:border-[#D38928] hover:bg-[#FAF7F2]/60 transition-all group bg-white shadow-2xs font-body">
                            <div class="w-16 h-16 bg-[#FAF7F2] rounded-[8px] border border-[#EADBCC] overflow-hidden shrink-0 flex items-center justify-center">
                                <img src="${p.image}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform" onerror="this.src='/assets/images/devi-refill-pack-card.jpg'">
                            </div>
                            <div class="ml-3.5 flex-1 min-w-0 space-y-1 font-body">
                                <div class="flex items-center justify-between font-body">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase font-body truncate">${p.category}</span>
                                    ${!p.is_in_stock ? '<span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-1.5 py-0.5 rounded font-body">Sold Out</span>' : ''}
                                </div>
                                <h6 class="text-xs sm:text-sm font-bold text-[#121212] group-hover:text-[#D38928] truncate font-body">
                                    ${p.title}
                                </h6>
                                <div class="flex items-center space-x-2 font-body">
                                    <span class="text-xs sm:text-sm font-bold text-[#C87A1E] font-body">${p.formatted_price}</span>
                                    ${p.formatted_compare_price ? `<span class="text-xs text-gray-400 line-through font-medium font-body">${p.formatted_compare_price}</span>` : ''}
                                </div>
                            </div>
                        </a>
                    `).join('');
                }
            } else {
                if (resultsContainer) {
                    resultsContainer.classList.add('hidden');
                    resultsContainer.innerHTML = '';
                }
                if (emptyState) emptyState.classList.remove('hidden');
            }
        } catch (e) {
            console.error('Search error:', e);
            if (spinner) spinner.classList.add('hidden');
        }
    }

    if (input) {
        input.addEventListener('input', (e) => {
            const query = e.target.value.trim();
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                performSearch(query);
            }, 180);
        });
    }

    document.querySelectorAll('.search-tag').forEach(tag => {
        tag.addEventListener('click', () => {
            if (input) {
                const text = tag.textContent.trim();
                input.value = text;
                input.focus();
                performSearch(text);
            }
        });
    });
}

// -------------------------------------------------------------------------
// 10. Luxury Scroll Reveal & Smooth Loading Effects
// -------------------------------------------------------------------------
function initScrollReveal() {
    const targets = document.querySelectorAll('section:not(#hero-banner-carousel):not(#announcement-bar), .scroll-reveal, .fade-in-up');
    
    if (!('IntersectionObserver' in window)) {
        targets.forEach(el => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        rootMargin: '0px 0px -40px 0px',
        threshold: 0.06
    });

    targets.forEach(el => {
        if (!el.classList.contains('scroll-reveal') && !el.classList.contains('fade-in-up')) {
            el.classList.add('scroll-reveal');
        }
        observer.observe(el);
    });
}