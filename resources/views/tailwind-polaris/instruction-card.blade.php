<div id="dropdown-element" class="lg:w-5/6 bg-white border mx-auto my-10 border-gray-200 rounded-xl p-4 border-b-gray-200 border-b-2 shadow-sm complex-learn-card-dropdown">
    <div class="flex justify-between">
        <h2 class="m-0 text-sm mb-2 text-inherit font-medium">
            Improve your conversion rate
        </h2>
        <div class="flex justify-between items-center relative">
            <div id="menu-button" class="relative inline-block h-fit text-right rounded-md p-1 hover:bg-gray-100 hover:text-gray-600 focus:ring-offset-gray-100" style="cursor: pointer; padding: 3px;" onclick="toggleMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                </svg>
            </div>
            <div id="main-toogler-dots" class="hidden relative">
                <div id="dropdown-menu" class="absolute right-0 top-0 z-10 mt-4 w-30 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="px-1.5 py-1.5 rounded" role="none">
                        <a href="#" class="text-gray-700 block px-2 py-1.5 rounded-md hover:bg-gray-100 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Dismiss</a>
                    </div>
                </div>
            </div>
            <div>
                <div id="upicon" class="hover:bg-gray-100 rounded-md cursor-pointer p-1" onclick="dropdown(1)">
                    <svg id="up" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/>
                    </svg>
                </div>
                <div id="downIcon" class="hover:bg-gray-100 checkdisplay rounded-md cursor-pointer p-1" onclick="dropdown(2)">
                    <svg id="down" class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <p class="text-sm text-inherit">
        Increase the percentage of the visitors who purchase something from your online store.
    </p>
    <p id="completed-text" class="text text-inherit border border-gray-300 rounded-md mt-2 text-center">
        0/3 completed
    </p>
    <br>

    @foreach ($sections as $index => $section)
        <div id="sec{{ $index + 1 }}" class="clcd-check rounded-lg my-3 p-2 mb-2">
            <div class="flex">
                <div>
                    <img id="check{{ $index + 1 }}dot" src="{{ asset('images/icons/circle-dash.svg') }}" width="24" height="24" alt="Circle Dash">
                    <svg id="check{{ $index + 1 }}tic" class="checkdisplay" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </div>
                &ensp;
                <div class="text-sm mb-2 text-inherit">{{ $section['title'] }}</div>
            </div>
            <div class="flex">
                <div style="width: 70%;">
                    <p class="text-sm mb-2 text-inherit font ml-8">
                        {{ $section['description'] }} <a href="{{ $section['learnMoreLink'] }}" class="text-blue-500 font-medium">Learn more</a>
                    </p>
                    <button id="check{{ $index + 1 }}" class="primary-button buttonPressable primaryButtonShadow text-white px-2 py-1.5 text-xs rounded-md font-semibold ml-8" onclick="incrementcheck({{ $index + 1 }})">
                        <span class="">Add app</span>
                    </button>
                </div>
                <div style="width: 30%;" class="flex justify-between">
                    <div class="p-2">
                        <img class="w-50 h-28" src="{{ asset('images/replace.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<x-splade-script>
    window.check1 = 0;
    window.check2 = 0;
    window.check3 = 0;

    window.checklistupdate = function () {
        let checkcount = check1 + check2 + check3;
        let update = checkcount + "/3 completed";
        document.getElementById("completed-text").innerHTML = update;
    };

    window.incrementcheck = function (checkno) {
        if (checkno == 1) {
            check1 = 1;
            document.getElementById("check1dot").classList.add("checkdisplay");
            document.getElementById("check1tic").classList.remove("checkdisplay");
        } else if (checkno == 2) {
            check2 = 1;
            document.getElementById("check2dot").classList.add("checkdisplay");
            document.getElementById("check2tic").classList.remove("checkdisplay");
        } else {
            check3 = 1;
            document.getElementById("check3dot").classList.add("checkdisplay");
            document.getElementById("check3tic").classList.remove("checkdisplay");
        }

        checklistupdate();
    };

    window.dropdown = function (num) {
        var element = document.getElementById("dropdown-element");
        var svgElement = document.getElementById("upicon");
        if (num == 1) {
            element.style.maxHeight = "50px";
            // remove element from dom

            document.getElementById("upicon").classList.add("checkdisplay");
            document.getElementById("downIcon").classList.remove("checkdisplay");
        } else {
            element.style.maxHeight = "500px";
            document.getElementById("downIcon").classList.add("checkdisplay");
            document.getElementById("upicon").classList.remove("checkdisplay");
        }
    };

    window.toggleMenu = function () {
        const menu = document.getElementById("main-toogler-dots");
        menu.classList.toggle("hidden");
    };

    window.handleClickOutside = function (event) {
        const menu = document.getElementById("main-toogler-dots");
        const button = document.getElementById("menu-button");

        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add("hidden");
        }
    };

    document.addEventListener("click", handleClickOutside);

    // Select all elements with the class 'clcd-check'
    const checkElements = document.querySelectorAll(".clcd-check");

    // Add a click event listener to each element
    checkElements.forEach((element) => {
        element.addEventListener("click", function () {
            this.classList.toggle("expanded");
        });
    });
</x-splade-script>
