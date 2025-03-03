<x-splade-script>
        // Select all elements with the class 'copy-text'
        const copyElements = document.querySelectorAll('.copy-text');

        // Create a single notification element
        const notification = document.createElement('div');
        notification.classList.add('fixed', 'top-6', 'right-4', 'bg-green-500', 'text-white', 'p-4', 'rounded', 'shadow-lg', 'hidden');
        notification.textContent = 'Text copied to clipboard!';
        document.body.appendChild(notification);

        // Add click event listener to all copy-text elements
        copyElements.forEach(element => {
            element.addEventListener('click', function () {
                const textToCopy = this.getAttribute('data-copy-text') || this.textContent;

                navigator.clipboard.writeText(textToCopy.trim()).then(() => {
                    // Show notification
                    notification.classList.remove('hidden');

                    // Add a subtle background effect to the clicked element
                    this.classList.add('bg-blue-100');

                    // Hide notification and remove background effect after 3 seconds
                    setTimeout(() => {
                        notification.classList.add('hidden');
                        this.classList.remove('bg-blue-100');
                    }, 3000);
                }).catch(err => {
                    console.error('Failed to copy text: ', err);
                });
            });
        });
</x-splade-script>