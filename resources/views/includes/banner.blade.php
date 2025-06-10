<div class="relative mx-auto w-full max-w-6xl overflow-hidden rounded-xl shadow-lg">
    <div id="carousel-container" class="flex transition-transform duration-700 ease-in-out">
        <!-- Slide 1 -->
        <div class="relative min-w-full">
            <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp"
                class="h-64 w-full object-cover" />
            <div
                class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-4 py-6 text-white">
                <h2 class="text-xl font-semibold">Pengertian Ibadah dan hakikatnya</h2>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="relative min-w-full">
            <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
                class="h-64 w-full object-cover" />
            <div
                class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-4 py-6 text-white">
                <h2 class="text-xl font-semibold">Makna Shalat dalam Kehidupan</h2>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="relative min-w-full">
            <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp"
                class="h-64 w-full object-cover" />
            <div
                class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-4 py-6 text-white">
                <h2 class="text-xl font-semibold">Ibadah Sebagai Tujuan Hidup</h2>
            </div>
        </div>
    </div>
</div>

<!-- Navigasi bulat -->
<div class="mt-4 flex justify-center gap-2">
    <button class="h-3 w-3 rounded-full bg-gray-300 transition hover:bg-gray-500" data-index="0"></button>
    <button class="h-3 w-3 rounded-full bg-gray-300 transition hover:bg-gray-500" data-index="1"></button>
    <button class="h-3 w-3 rounded-full bg-gray-300 transition hover:bg-gray-500" data-index="2"></button>
</div>

<script>
    const container = document.getElementById("carousel-container");
    const bullets = document.querySelectorAll("[data-index]");
    const totalSlides = container.children.length;
    let currentSlide = 0;
    let autoSlide;

    function updateSlide(index) {
        container.style.transform = `translateX(-${index * 100}%)`;
        bullets.forEach((b, i) => {
            b.classList.remove("bg-gray-300", "bg-gray-500", "dark:bg-white");

            // Tambahkan warna berdasarkan kondisi
            if (i === index) {
                b.classList.add("bg-gray-500", "dark:bg-white"); // Aktif (gelap dan terang)
            } else {
                b.classList.add("bg-gray-300"); // Tidak aktif
            }
        });
        currentSlide = index;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlide(currentSlide);
    }

    bullets.forEach((btn) => {
        btn.addEventListener("click", () => {
            updateSlide(Number(btn.dataset.index));
            resetAutoSlide();
        });
    });

    function resetAutoSlide() {
        clearInterval(autoSlide);
        autoSlide = setInterval(nextSlide, 5000);
    }

    autoSlide = setInterval(nextSlide, 5000);

    // Swipe support
    let startX = 0;
    container.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
    });

    container.addEventListener("touchend", (e) => {
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) {
            nextSlide();
            resetAutoSlide();
        } else if (endX - startX > 50) {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlide(currentSlide);
            resetAutoSlide();
        }
    });

    updateSlide(0); // Initialize first
</script>
