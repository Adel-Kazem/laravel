<!-- resources/views/components/tailwind-polaris/media-card.blade.php -->
@props([
    'title' => '',
    'description' => '',
    'buttonText' => '',
    'showDismissButton' => false
])

<div class="lg:w-5/6 border mx-auto my-10 border-gray-300 rounded-xl overflow-hidden sm:h-40">
    <div class="sm:flex">
        <img
                class="sm:w-1/3 w-full sm:h-40 object-cover"
                src="https://burst.shopifycdn.com/photos/business-woman-smiling-in-office.jpg?width=1850"
                alt=""
        />
        <div class="bg-white p-5 shadow-sm w-full space-y-3">
            <div class="flex justify-between">
                <h2 class="font-medium text-gray-700 mt-auto">{{ $title }}</h2>

                @if ($showDismissButton)
                    <div class="relative inline-block h-fit text-right rounded-md p-1 hover:bg-gray-100 hover:text-gray-600 focus:ring-offset-gray-100">
                        <div>
                            <div id="menu-button" style="cursor: pointer; padding: 3px">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-three-dots"
                                        viewBox="0 0 16 16"
                                >
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </div>
                            <div id="main-toogler-dots" class="hidden">
                                <div
                                        id="dropdown-menu"
                                        class="absolute right-0 z-10 mt-0 w-30 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu"
                                        aria-orientation="vertical"
                                        aria-labelledby="menu-button"
                                        tabindex="-1"
                                >
                                    <div class="px-1.5 py-1.5 rounded" role="none">
                                        <a href="#" class="text-gray-700 block px-2 py-1.5 rounded-md hover:bg-gray-100 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Dismiss</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <p class="text text-inherit">{{ $description }}</p>
            <button class="bg-white buttonPressable hover:bg-neutral-50 active:bg-[#f7f7f7] boxShadowNormal text-[#303030] px-2 py-1.5 text-xs rounded-md font-semibold">
                <span>{{ $buttonText }}</span>
            </button>
        </div>
    </div>
</div>

@if ($showDismissButton)
    <x-splade-script>
        document.addEventListener('DOMContentLoaded', function () {
            function toggleMenu() {
                const menu = document.getElementById("main-toogler-dots");
                menu.classList.toggle("hidden");
            }

            function handleClickOutside(event) {
                const menu = document.getElementById("main-toogler-dots");
                const button = document.getElementById("menu-button");

                if (!menu.contains(event.target) && !button.contains(event.target)) {
                    menu.classList.add("hidden");
                }
            }

            document.getElementById("menu-button").addEventListener("click", toggleMenu);
            document.addEventListener("click", handleClickOutside);

            document.getElementById("menu-item-0").addEventListener("click", function(event) {
                event.preventDefault();
                const menu = document.getElementById("main-toogler-dots");
                menu.classList.add("hidden");
            });
        });
    </x-splade-script>
@endif
