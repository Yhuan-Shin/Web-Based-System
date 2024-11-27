<div>
    <style>
        .stories-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the items */
            padding: 20px; /* Add some padding around the container */
            background-color: #f9f9f9; /* Light background for contrast */
        }

        .story-item {
            background: white; /* White background for each story */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin: 10px; /* Space between items */
            overflow: hidden; /* Prevent overflow */
            width: 300px; /* Fixed width for uniformity */
            transition: transform 0.2s; /* Smooth scaling effect */
        }

        .story-item:hover {
            transform: scale(1.05); /* Scale up on hover */
        }

        .story-image {
            width: 100%; /* Full width */
            height: auto; /* Maintain aspect ratio */
        }

        .no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px; /* Fixed height for no-image placeholder */
            background-color: #e0e0e0; /* Grey background */
            color: #666; /* Dark grey text */
            font-size: 16px; /* Font size */
            font-style: italic; /* Italic style */
        }

        .story-description {
            padding: 15px; /* Padding around the description */
            font-size: 14px; /* Font size for description */
            color: #333; /* Dark text color */
            text-align: center; /* Center align text */
        }
    </style>
    <div class="modal fade" id="viewStoryModal" wire:ignore.self tabindex="-1" aria-labelledby="viewStoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewStoryModalLabel">Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <div class="stories-container">
                        @foreach($story as $item)
                            <div class="story-item">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Story Image" class="story-image">
                                @else
                                    <div class="no-image">No Image</div>
                                @endif
                                <p class="story-description">{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
