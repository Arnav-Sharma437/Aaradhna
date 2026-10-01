@extends('layouts.admin')

@section('title', 'Devotee Testimonials & Stories — Admin')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-[#121212] font-heading">Devotee Testimonials &amp; Stories</h1>
            <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Manage customer experiences, divine stories, and reviews displayed across the storefront.</p>
        </div>
        <button 
            type="button" 
            onclick="openTestimonialModal()" 
            class="inline-flex items-center space-x-2 px-4 py-2 rounded-[8px] bg-[#121212] hover:bg-[#252525] text-white text-xs font-bold shadow-xs transition-colors shrink-0"
        >
            <svg class="w-4 h-4 text-[#D38928]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            <span>+ Add Testimonial</span>
        </button>
    </div>

    <!-- Testimonials Grid / List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($testimonials as $item)
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-xs p-5 flex flex-col justify-between hover:border-[#D38928]/40 transition-all">
                <div>
                    <!-- Card Top: Rating & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center text-amber-400 text-xs">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $item->rating ? 'text-amber-400' : 'text-gray-200' }}">★</span>
                            @endfor
                            <span class="ml-1 text-[11px] font-bold text-gray-700">({{ $item->rating }}.0)</span>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full {{ $item->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-600' }}">
                            {{ $item->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </div>

                    <!-- Quote -->
                    <p class="text-xs text-gray-700 italic leading-relaxed line-clamp-4 mb-4 font-serif">
                        “{{ $item->content ?? $item->quote }}”
                    </p>
                </div>

                <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                    <div class="flex items-center space-x-2.5 min-w-0">
                        <div class="w-8 h-8 rounded-full bg-[#FAF5EE] text-[#D38928] font-bold text-xs flex items-center justify-center border border-[#D38928]/30 shrink-0 font-heading">
                            {{ strtoupper(substr($item->customer_name ?? $item->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-gray-900 truncate">{{ $item->customer_name ?? $item->name }}</h4>
                            <p class="text-[10px] text-gray-500 truncate">{{ $item->customer_city ?? $item->location ?? 'Verified Devotee' }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center space-x-1">
                        <form method="POST" action="{{ route('admin.testimonials.toggle-status', $item) }}" class="inline m-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit" title="{{ $item->is_active ? 'Hide Testimonial' : 'Show Testimonial' }}" class="p-1.5 text-gray-400 hover:text-gray-700 rounded-md hover:bg-gray-100">
                                @if($item->is_active)
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                @endif
                            </button>
                        </form>

                        <button 
                            type="button" 
                            onclick="editTestimonial({{ json_encode($item) }})"
                            title="Edit Testimonial" 
                            class="p-1.5 text-gray-400 hover:text-[#D38928] rounded-md hover:bg-gray-100"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>

                        <form method="POST" action="{{ route('admin.testimonials.destroy', $item) }}" onsubmit="return confirm('Delete this testimonial permanently?');" class="inline m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="p-1.5 text-gray-400 hover:text-red-600 rounded-md hover:bg-gray-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-[14px] border border-[#E1E3E5] p-12 text-center">
                <p class="text-sm text-gray-500 mb-3">No devotee testimonials added yet.</p>
                <button type="button" onclick="openTestimonialModal()" class="px-4 py-2 rounded-[8px] bg-[#121212] text-white text-xs font-bold">+ Add First Testimonial</button>
            </div>
        @endforelse
    </div>

</div>

<!-- Testimonial Modal (Add/Edit) -->
<div id="testimonial-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[16px] max-w-lg w-full p-6 shadow-2xl space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
            <h3 id="modal-title" class="text-base font-bold text-gray-900 font-heading">Add Devotee Testimonial</h3>
            <button type="button" onclick="closeTestimonialModal()" class="p-1 text-gray-400 hover:text-gray-600 rounded-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form id="testimonial-form" method="POST" action="{{ route('admin.testimonials.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="_method" id="form-method" value="POST">

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Customer / Devotee Name *</label>
                <input type="text" name="customer_name" id="modal-name" required class="w-full px-3 py-2 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]" placeholder="e.g., Meera Joshi">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">City / Location</label>
                    <input type="text" name="customer_city" id="modal-city" class="w-full px-3 py-2 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]" placeholder="e.g., Varanasi, UP">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Rating (1 - 5) *</label>
                    <select name="rating" id="modal-rating" class="w-full px-3 py-2 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                        <option value="5">⭐⭐⭐⭐⭐ (5 Star)</option>
                        <option value="4">⭐⭐⭐⭐ (4 Star)</option>
                        <option value="3">⭐⭐⭐ (3 Star)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Product Purchased (Optional)</label>
                <input type="text" name="product_name" id="modal-product" class="w-full px-3 py-2 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]" placeholder="e.g., Original Pure Bhimseni Camphor 500g">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Devotee Review / Story *</label>
                <textarea name="content" id="modal-content" rows="4" required class="w-full px-3 py-2 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]" placeholder="Write their experience..."></textarea>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="is_active" id="modal-active" value="1" checked class="rounded border-gray-300 text-[#D38928] focus:ring-[#D38928]">
                <label for="modal-active" class="text-xs text-gray-700 font-semibold">Display immediately on storefront</label>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-3 border-t border-gray-100">
                <button type="button" onclick="closeTestimonialModal()" class="px-4 py-2 rounded-[8px] bg-gray-100 text-gray-700 text-xs font-bold hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-[8px] bg-[#121212] text-white text-xs font-bold hover:bg-[#252525]">Save Testimonial</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const modal = document.getElementById('testimonial-modal');
    const form = document.getElementById('testimonial-form');
    const methodInput = document.getElementById('form-method');

    function openTestimonialModal() {
        form.reset();
        form.action = "{{ route('admin.testimonials.store') }}";
        methodInput.value = 'POST';
        document.getElementById('modal-title').textContent = 'Add Devotee Testimonial';
        document.getElementById('modal-active').checked = true;
        modal.classList.remove('hidden');
    }

    function editTestimonial(item) {
        form.action = `/admin/testimonials/${item.id}`;
        methodInput.value = 'PUT';
        document.getElementById('modal-title').textContent = 'Edit Devotee Testimonial';
        document.getElementById('modal-name').value = item.customer_name || item.name || '';
        document.getElementById('modal-city').value = item.customer_city || item.location || '';
        document.getElementById('modal-rating').value = item.rating || 5;
        document.getElementById('modal-product').value = item.product_name || '';
        document.getElementById('modal-content').value = item.content || item.quote || '';
        document.getElementById('modal-active').checked = !!item.is_active;
        modal.classList.remove('hidden');
    }

    function closeTestimonialModal() {
        modal.classList.add('hidden');
    }
</script>
@endpush

@endsection
