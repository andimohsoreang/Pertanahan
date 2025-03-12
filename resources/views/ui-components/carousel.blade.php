<x-layout.default>


    <link rel="stylesheet" href="{{ Vite::asset('resources/css/swiper-bundle.min.css') }}">
    <script src="/assets/js/swiper-bundle.min.js"></script>
    <div x-data="carousel">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Components</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Carousel</span>
            </li>
        </ul>

        <div class="pt-5 space-y-8">
            <div class="panel p-3 flex items-center text-primary overflow-x-auto whitespace-nowrap">
                <div class="ring-2 ring-primary/30 rounded-full bg-primary text-white p-1.5 ltr:mr-3 rtl:ml-3">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5">
                        <path
                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path opacity="0.5"
                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://www.npmjs.com/package/swiper"
                    target="_blank" class="block hover:underline">https://www.npmjs.com/package/swiper</a>
            </div>

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
                <!-- basic -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Basic</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code1')">
                            <span class="flex items-center">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Code
                            </span>
                        </a>
                    </div>
                    <div class="swiper max-w-3xl mx-auto mb-5" id="slider1">
                        <div class="swiper-wrapper">
                            <template x-for="item in items">
                                <div class="swiper-slide">
                                    <img :src="`/assets/images/${item}`"
                                        class="w-full max-h-80 object-cover" alt="image" />
                                </div>
                            </template>
                        </div>
                        <a href="javascript:;"
                            class="swiper-button-prev-ex1 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="swiper-button-next-ex1 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="swiper-pagination"></div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div class=&quot;swiper max-w-3xl mx-auto mb-5&quot; id=&quot;slider1&quot;&gt;
        &lt;div class=&quot;swiper-wrapper&quot;&gt;
            &lt;template x-for=&quot;item in items&quot;&gt;
                &lt;div class=&quot;swiper-slide&quot;&gt;
                    &lt;img :src=&quot;`/assets/images/${item} `&quot; class=&quot;w-full max-h-80 object-cover&quot; alt=&quot;image&quot; /&gt;
                &lt;/div&gt;
            &lt;/template&gt;
        &lt;/div&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-prev-ex1 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-next-ex1 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;div class=&quot;swiper-pagination&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
    const swiper1 = new Swiper(&quot;#slider1&quot;, {
        navigation: {
            nextEl: '.swiper-button-next-ex1',
            prevEl: '.swiper-button-prev-ex1',
        },
        pagination: {
            el: &quot;.swiper-pagination&quot;,
            clickable: true,
        },
    });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- autopaly -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Autopaly</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code2')">
                            <span class="flex items-center">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Code
                            </span>
                        </a>
                    </div>
                    <div class="swiper max-w-3xl mx-auto mb-5" id="slider2">
                        <div class="swiper-wrapper">
                            <template x-for="item in items">
                                <div class="swiper-slide">
                                    <img :src="`/assets/images/${item}`"
                                        class="w-full max-h-80 object-cover" alt="image" />
                                    <div class="absolute z-[999] text-white top-1/4 ltr:left-12 rtl:right-12">
                                        <div class="sm:text-3xl text-base font-bold">This is blog Image</div>
                                        <div class="sm:mt-5 mt-1 w-4/5 text-base sm:block hidden font-medium">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard.
                                        </div>
                                        <button type="button" class="mt-4 btn btn-primary">Learn more</button>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <a href="javascript:;"
                            class="swiper-button-prev-ex2 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="swiper-button-next-ex2 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- autopaly --&gt;
    &lt;div class=&quot;swiper max-w-3xl mx-auto mb-5&quot; id=&quot;slider2&quot;&gt;
        &lt;div class=&quot;swiper-wrapper&quot;&gt;
            &lt;template x-for=&quot;item in items&quot;&gt;
                &lt;div class=&quot;swiper-slide&quot;&gt;
                    &lt;img :src=&quot;`/assets/images/${item} `&quot; class=&quot;w-full max-h-80 object-cover&quot; alt=&quot;image&quot; /&gt;
                    &lt;div class=&quot;absolute z-[999] text-white top-1/4 ltr:left-12 rtl:right-12&quot;&gt;
                        &lt;div class=&quot;sm:text-3xl text-base font-bold&quot;&gt;This is blog Image&lt;/div&gt;
                        &lt;div class=&quot;sm:mt-5 mt-1 w-4/5 text-base sm:block hidden font-medium&quot;&gt;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                        &lt;/div&gt;
                        &lt;button type=&quot;button&quot; class=&quot;mt-4 btn btn-primary&quot;&gt;Learn more&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/template&gt;
        &lt;/div&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-prev-ex2 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-next-ex2 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
           &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
    const swiper2 = new Swiper(&quot;#slider2&quot;, {
        navigation: {
            nextEl: '.swiper-button-next-ex2',
            prevEl: '.swiper-button-prev-ex2',
        },
        autoplay: {
            delay: 2000,
        },
    });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- vertical -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Vertical</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code3')">
                            <span class="flex items-center">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Code
                            </span>
                        </a>
                    </div>
                    <div class="swiper max-w-3xl mx-auto mb-5" id="slider3">
                        <div class="swiper-wrapper">
                            <template x-for="item in items">
                                <div class="swiper-slide">
                                    <img :src="`/assets/images/${item}`" class="w-full"
                                        alt="image" />
                                    <div
                                        class="absolute z-[999] text-white top-1/2 left-1/2 w-full -translate-x-1/2 text-center">
                                        <div class="sm:text-xl text-base font-medium mx-4">
                                            Lorem Ipsum is simply dummy text of the printing.
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- vertical --&gt;
    &lt;div class=&quot;swiper max-w-3xl mx-auto mb-5&quot; id=&quot;slider3&quot;&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;
        &lt;template x-for=&quot;item in items&quot;&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img :src=&quot;`/assets/images/${item} `&quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                &lt;div class=&quot;absolute z-[999] text-white top-1/2 left-1/2 w-full -translate-x-1/2 text-center&quot;&gt;
                    &lt;div class=&quot;sm:text-xl text-base font-medium mx-4&quot;&gt;
                        Lorem Ipsum is simply dummy text of the printing.
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/template&gt;
    &lt;/div&gt;
    &lt;div class=&quot;swiper-pagination&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
    const swiper3 = new Swiper(&quot;#slider3&quot;, {
        direction: &quot;vertical&quot;,
        pagination: {
            el: &quot;.swiper-pagination&quot;,
            clickable: true,
        },
    });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Loop -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Loop</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code4')">
                            <span class="flex items-center">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Code
                            </span>
                        </a>
                    </div>
                    <div class="swiper max-w-3xl mx-auto mb-5" id="slider4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/assets/images/carousel1.jpeg" class="w-full"
                                    alt="image" />
                                <div
                                    class="absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11">
                                    <div class="text-3xl font-bold">Slide 1</div>
                                    <div class="mb-4 sm:text-base font-medium">
                                        Lorem Ipsum is simply dummy text of the printing.
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/images/carousel2.jpeg" class="w-full"
                                    alt="image" />
                                <div
                                    class="absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11">
                                    <div class="text-3xl font-bold">Slide 2</div>
                                    <div class="mb-4 sm:text-base font-medium">
                                        Lorem Ipsum is simply dummy text of the printing.
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/images/carousel3.jpeg" class="w-full"
                                    alt="image" />
                                <div
                                    class="absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11">
                                    <div class="text-3xl font-bold">Slide 3</div>
                                    <div class="mb-4 sm:text-base font-medium">
                                        Lorem Ipsum is simply dummy text of the printing.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;"
                            class="swiper-button-prev-ex4 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="swiper-button-next-ex4 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="swiper-pagination"></div>
                    </div>

                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- loop --&gt;
    &lt;div class=&quot;swiper max-w-3xl mx-auto mb-5&quot; id=&quot;slider4&quot;&gt;
        &lt;div class=&quot;swiper-wrapper&quot;&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img src=&quot; /assets/images/carousel1.jpeg &quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                &lt;div class=&quot;absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11&quot;&gt;
                    &lt;div class=&quot;text-3xl font-bold&quot;&gt;Slide 1&lt;/div&gt;
                    &lt;div class=&quot;mb-4 sm:text-base font-medium&quot;&gt;
                        Lorem Ipsum is simply dummy text of the printing.
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img src=&quot; /assets/images/carousel2.jpeg &quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                &lt;div class=&quot;absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11&quot;&gt;
                    &lt;div class=&quot;text-3xl font-bold&quot;&gt;Slide 2&lt;/div&gt;
                    &lt;div class=&quot;mb-4 sm:text-base font-medium&quot;&gt;
                        Lorem Ipsum is simply dummy text of the printing.
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img src=&quot; /assets/images/carousel3.jpeg &quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                &lt;div class=&quot;absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11&quot;&gt;
                    &lt;div class=&quot;text-3xl font-bold&quot;&gt;Slide 3&lt;/div&gt;
                    &lt;div class=&quot;mb-4 sm:text-base font-medium&quot;&gt;
                        Lorem Ipsum is simply dummy text of the printing.
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-prev-ex4 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-next-ex4 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;div class=&quot;swiper-pagination&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- script --&gt;
    &lt;script&gt;
    const swiper4 = new Swiper(&quot;#slider4&quot;, {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: &quot;.swiper-pagination&quot;,
            clickable: true,
            type: &quot;fraction&quot;,
        },
        navigation: {
            nextEl: '.swiper-button-next-ex4',
            prevEl: '.swiper-button-prev-ex4',
        },
    });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Multiple -->
                <div class="panel lg:col-span-2">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Multiple Slides</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code5')">
                            <span class="flex items-center">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Code
                            </span>
                        </a>
                    </div>
                    <div class="swiper" id="slider5">
                        <div class="swiper-wrapper">
                            <template x-for="item in items">
                                <div class="swiper-slide">
                                    <img :src="`/assets/images/${item}`" class="w-full"
                                        alt="image" />
                                </div>
                            </template>
                            <template x-for="item in items">
                                <div class="swiper-slide">
                                    <img :src="`/assets/images/${item}`" class="w-full"
                                        alt="image" />
                                </div>
                            </template>
                        </div>
                        <a href="javascript:;"
                            class="swiper-button-prev-ex5 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-[44%] -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="swiper-button-next-ex5 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-[44%] -translate-y-1/2">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="swiper-pagination">
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code5')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- multiple --&gt;
    &lt;div class=&quot;swiper&quot; id=&quot;slider5&quot;&gt;
        &lt;div class=&quot;swiper-wrapper&quot;&gt;
            &lt;template x-for=&quot;item in items&quot;&gt;
                &lt;div class=&quot;swiper-slide&quot;&gt;
                    &lt;img :src=&quot;`/assets/images/${item} `&quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                &lt;/div&gt;
            &lt;/template&gt;
            &lt;template x-for=&quot;item in items&quot;&gt;
                &lt;div class=&quot;swiper-slide&quot;&gt;
                    &lt;img :src=&quot;`/assets/images/${item} `&quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                &lt;/div&gt;
            &lt;/template&gt;
        &lt;/div&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-prev-ex5 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-[44%] -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-next-ex5 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-[44%] -translate-y-1/2&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/a&gt;
        &lt;div class=&quot;swiper-pagination&quot;&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
    const swiper5 = new Swiper(&quot;#slider5&quot;, {
        navigation: {
            nextEl: '.swiper-button-next-ex5',
            prevEl: '.swiper-button-prev-ex5',
        },
        pagination: {
            el: &quot;.swiper-pagination&quot;,
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

        },
    });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->



    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("carousel", () => ({
                items: ['carousel1.jpeg', 'carousel2.jpeg', 'carousel3.jpeg'],

                init() {
                    // basic
                    const swiper1 = new Swiper("#slider1", {
                        navigation: {
                            nextEl: '.swiper-button-next-ex1',
                            prevEl: '.swiper-button-prev-ex1',
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                    });
                    // Autoplay
                    const swiper2 = new Swiper("#slider2", {
                        navigation: {
                            nextEl: '.swiper-button-next-ex2',
                            prevEl: '.swiper-button-prev-ex2',
                        },
                        autoplay: {
                            delay: 2000,
                        },
                    });
                    // vertical
                    setTimeout(() => {
                        const swiper3 = new Swiper("#slider3", {
                            direction: "vertical",
                            pagination: {
                                el: ".swiper-pagination",
                                clickable: true,
                            },
                            autoplay: {
                                delay: 2000,
                            },
                        });
                    });
                    // Loop
                    const swiper4 = new Swiper("#slider4", {
                        slidesPerView: 1,
                        spaceBetween: 30,
                        loop: true,
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                            type: "fraction",
                        },
                        navigation: {
                            nextEl: '.swiper-button-next-ex4',
                            prevEl: '.swiper-button-prev-ex4',
                        },
                    });
                    // Multiple Slides
                    const swiper5 = new Swiper("#slider5", {
                        navigation: {
                            nextEl: '.swiper-button-next-ex5',
                            prevEl: '.swiper-button-prev-ex5',
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                        breakpoints: {
                            1024: {
                                slidesPerView: 3,
                                spaceBetween: 30,
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 40,
                            },
                            320: {
                                slidesPerView: 1,
                                spaceBetween: 20,
                            },

                        },
                    });
                },

                // highlightjs
                codeArr: [],
                toggleCode(name) {
                    if (this.codeArr.includes(name)) {
                        this.codeArr = this.codeArr.filter((d) => d != name);
                    } else {
                        this.codeArr.push(name);

                        setTimeout(() => {
                            document.querySelectorAll('pre.code').forEach(el => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                }
            }));
        });
    </script>
</x-layout.default>
