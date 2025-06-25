<style>
    a.edit-button-fallback {
        display: inline-flex !important;
        align-items: center !important;
        background: #3b82f6 !important;
        color: white !important;
        padding: 0.5rem 1rem !important;
        border-radius: 0.25rem !important;
    }
    a.edit-button-fallback svg {
        width: 1rem !important;
        height: 1rem !important;
        margin-right: 0.25rem !important;
    }
</style>
<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="sortable-container" class="space-y-3">
                        @foreach($texts as $text)
                        <div 
                            data-id="{{ $text->id }}"
                            class="sortable-item bg-white p-4 rounded-lg shadow border border-gray-200 flex items-center justify-between"
                        >
                            <div class="flex items-center space-x-4">
                                <!-- Drag handle -->
                                <svg class="drag-handle w-5 h-5 text-gray-400 cursor-move" 
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                                </svg>
                                
                                <span class="text-gray-800">{{ $text->title }}</span>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <span class="order-badge bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                                    Position: {{ $text->order }}
                                </span>
                                
     <!-- Edit button - Fixed version -->
<a class="edit-button-fallback" href="{{ route('texts.edit', $text) }} " 
   class="bg-blue-500 text-white px-3 py-1 ounded flex items-center">
    <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
    </svg>
    Edit
</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include required libraries and scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing sortable...');
        
        const container = document.getElementById('sortable-container');
        
        if (container) {
            console.log('Container found, creating Sortable instance...');
            
            const sortable = new Sortable(container, {
                animation: 200,
                handle: '.drag-handle',
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                dragClass: 'sortable-drag',
                forceFallback: false,
                fallbackTolerance: 3,
                onStart: function(evt) {
                    console.log('Drag started');
                },
                onEnd: function(evt) {
                    console.log('Drag ended, saving new order...');
                    
                    const items = container.querySelectorAll('.sortable-item');
                    const ids = Array.from(items).map(item => item.getAttribute('data-id'));
                    
                    console.log('New order:', ids);
                    
                    const sortUrl = '{{ route("texts.sort") }}';
                    console.log('Posting to:', sortUrl);
                    
                    axios.post(sortUrl, {
                        ids: ids,
                        _token: '{{ csrf_token() }}'
                    })
                    .then(response => {
                        console.log('Sort response:', response.data);
                        
                        // Update position numbers visually
                        items.forEach((item, index) => {
                            const badge = item.querySelector('.order-badge');
                            if (badge) {
                                badge.textContent = `Position: ${index + 1}`;
                            }
                        });
                        
                        console.log('Sorting saved successfully');
                    })
                    .catch(error => {
                        console.error('Error saving sort order:', error);
                        if (error.response) {
                            console.error('Response data:', error.response.data);
                            console.error('Response status:', error.response.status);
                        }
                        // Reset on error
                        window.location.reload();
                    });
                }
            });
            
            console.log('Sortable initialized successfully');
        } else {
            console.error('Sortable container not found!');
        }
    });
    </script>
</x-app-layout>