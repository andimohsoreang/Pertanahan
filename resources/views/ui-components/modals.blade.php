<x-layout.default>



    <link rel="stylesheet" href="{{ Vite::asset('resources/css/swiper-bundle.min.css') }}">
    <script src="/assets/js/swiper-bundle.min.js"></script>

    <div x-data="modals">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Components</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Modals</span>
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://alpinejs.dev/component/modal"
                    target="_blank" class="block hover:underline">https://alpinejs.dev/component/modal</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
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


                    <div x-data="modal" class="mb-5">
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-primary" @click="toggle">Launch modal</button>
                        </div>
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                            :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <div class="font-bold text-lg">Modal Title</div>
                                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet
                                                ullamcorper mi.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="toggle">Discard</button>
                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                @click="toggle">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div x-data=&quot;modal&quot; class=&quot;mb-5&quot;&gt;
        &lt;!-- button --&gt;
        &lt;div class=&quot;flex items-center justify-center&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; @click=&quot;toggle&quot;&gt;Launch modal&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;div class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/div&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Vertically Centered -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Vertically Centered</h5>
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
                    <div class="mb-5" x-data="modal">
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-info" @click="toggle">Launch modal</button>
                        </div>
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                            :class="open && '!block'">
                            <div class="flex items-center justify-center min-h-screen px-4"
                                @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <h5 class="font-bold text-lg">Modal Title</h5>
                                        <button type="button" class="text-white-dark hover:text-dark"
                                            @click="toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet
                                                ullamcorper mi.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="toggle">Discard</button>
                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                @click="toggle">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- vertically centered --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;div class=&quot;flex items-center justify-center&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-info&quot; @click=&quot;toggle&quot;&gt;Launch modal&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-center justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- static -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Static</h5>
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
                    <div x-data="modal" class="mb-5">
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-secondary" @click="toggle">Static modal</button>
                        </div>
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                            :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <div class="font-bold text-lg">Modal Title</div>
                                        <button type="button" class="text-white-dark hover:text-dark"
                                            @click="toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet
                                                ullamcorper mi.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="toggle">Discard</button>
                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                @click="toggle">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- static --&gt;
    &lt;div x-data=&quot;modal&quot; class=&quot;mb-5&quot;&gt;
        &lt;!-- button --&gt;
        &lt;div class=&quot;flex items-center justify-center&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot; @click=&quot;toggle&quot;&gt;Static modal&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;div class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/div&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Remove animation -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Remove animation</h5>
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
                    <div class="mb-5" x-data="modal">
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-success" @click="toggle">Launch modal</button>
                        </div>
                        <div class="fixed inset-0 bg-[black]/60 z-[999] px-4 hidden" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-lg my-8">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <h5 class="font-bold text-lg">Modal Title</h5>
                                        <button type="button" class="text-white-dark hover:text-dark"
                                            @click="toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet
                                                ullamcorper mi.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="toggle">Discard</button>
                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                @click="toggle">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- remove animation --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;div class=&quot;flex items-center justify-center&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-success&quot; @click=&quot;toggle&quot;&gt;Launch modal&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] px-4 hidden&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-lg my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Optional sizes -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Optional sizes</h5>
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
                    <div class="mb-5">
                        <div class="flex items-center justify-center gap-2">
                            <div x-data="modal">
                                <button type="button" class="btn btn-warning" @click="toggle">Extra large</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999]  hidden" :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-danger" @click="toggle">Large</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999]  hidden" :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-xl my-8">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-secondary" @click="toggle">Small</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code5')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- extra large --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-warning&quot; @click=&quot;toggle&quot;&gt;Extra large&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999]  hidden&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- large --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-danger&quot; @click=&quot;toggle&quot;&gt;Large&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999]  hidden&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-xl my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- small --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot; @click=&quot;toggle&quot;&gt;Small&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Video -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Video</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code6')">
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
                    <div class="mb-5" x-data="modal">
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-primary" @click="toggle">Play Youtube</button>
                        </div>
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                            :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="max-w-3xl w-full my-8 overflow-hidden">
                                    <div class="text-right">
                                        <button type="button" class="text-white-dark hover:text-dark"
                                            @click="toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"
                                        class="w-full h-[250px] md:h-[550px]"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code6')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- video --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;div class=&quot;flex items-center justify-center&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; @click=&quot;toggle&quot;&gt;Play Youtube&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;w-11/12 lg:w-[800px]  my-8&quot;&gt;
                    &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/button&gt;
                    &lt;iframe src=&quot;https://www.youtube.com/embed/tgbNymZ7vqY&quot; class=&quot;w-full h-[250px] md:h-[550px]&quot;&gt;&lt;/iframe&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Animation Style Modal -->
                <div class="panel lg:col-span-2">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Animation Style Modal</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code7')">
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
                    <div class="mb-5">
                        <div class="flex flex-wrap items-center justify-center gap-2">
                            <div x-data="modal">
                                <button type="button" class="btn btn-primary" @click="toggle">FadeIn</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__fadeIn">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-info" @click="toggle">SlideIn Down</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__slideInDown">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-success" @click="toggle">FadeIn Up</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__fadeInUp">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-warning" @click="toggle">SlideIn Up</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4 py-8"
                                        @click.self="open = false">
                                        <div
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg animate__animated animate__slideInUp">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-danger" @click="toggle">FadeIn Left</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated"
                                            :class="$store.app.rtlClass === 'rtl' ? 'animate__fadeInRight' :
                                                'animate__fadeInLeft'">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-secondary" @click="toggle">RotateIn
                                    Left</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated"
                                            :class="$store.app.rtlClass === 'rtl' ? 'animate__rotateInDownRight' :
                                                'animate__rotateInDownLeft'">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-dark" @click="toggle">FadeIn Right</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated"
                                            :class="$store.app.rtlClass === 'rtl' ? 'animate__fadeInLeft' :
                                                'animate__fadeInRight'">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="modal">
                                <button type="button" class="btn btn-primary" @click="toggle">ZoomIn Up</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__zoomInUp">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div
                                                    class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                    <p>Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros.
                                                        Phasellus egestas sit amet velit sed luctus. Orci varius natoque
                                                        penatibus et magnis dis parturient montes, nascetur ridiculus
                                                        mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar.
                                                        Ut sit amet ullamcorper mi.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code7')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- fadein --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; @click=&quot;toggle&quot;&gt;FadeIn&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__fadeIn&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- slidein down --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-info&quot; @click=&quot;toggle&quot;&gt;SlideIn Down&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__slideInDown&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- fadein up --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-success&quot; @click=&quot;toggle&quot;&gt;FadeIn Up&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__fadeInUp&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- fadein left --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-warning&quot; @click=&quot;toggle&quot;&gt;SlideIn Up&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__slideInUp&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;&lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- fadein left --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-danger&quot; @click=&quot;toggle&quot;&gt;FadeIn Left&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated&quot; :class=&quot;$store.app.rtlClass === 'rtl' ? 'animate__fadeInRight' : 'animate__fadeInLeft'&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- rotatein left --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot; @click=&quot;toggle&quot;&gt;RotateIn Left&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated&quot; :class=&quot;$store.app.rtlClass === 'rtl' ? 'animate__rotateInDownRight' : 'animate__rotateInDownLeft'&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- fadein right --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-dark&quot; @click=&quot;toggle&quot;&gt;FadeIn Right&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated&quot; :class=&quot;$store.app.rtlClass === 'rtl' ? 'animate__fadeInLeft' : 'animate__fadeInRight'&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- zoomin up --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; @click=&quot;toggle&quot;&gt;ZoomIn Up&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 animate__animated animate__zoomInUp&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                            &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Custom -->
                <div class="panel lg:col-span-2">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Custom</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code8')">
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
                    <div class="mb-5">
                        <p class="text-center mb-4">More Custom Modals.</p>
                        <div class="flex flex-wrap items-center justify-center gap-2">
                            <!-- standard  -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-primary" @click="toggle">Standard</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                            <div
                                                class="dark:text-white-dark/70 text-base font-medium text-[#1f2937] p-5">
                                                <div
                                                    class="flex items-center justify-center w-16 h-16 rounded-full bg-[#f1f2f3] dark:bg-white/10 mx-auto">
                                                    <svg width="28" height="28" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                                            stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5"
                                                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="p-5">
                                                <div class="text-white-dark text-center">
                                                    <p>Vivamus vitae hendrerit neque. Orci varius natoque penatibus et
                                                        magnis dis parturient montes, nascetur ridiculus mus. Morbi
                                                        consequat auctor turpis, vitae dictum augue efficitur vitae.
                                                        Vestibulum a risus ipsum. Quisque nec lacus dolor. Quisque
                                                        ornare tempor orci id rutrum.</p>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tabs -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-info" @click="toggle">Tabs</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                            <div
                                                class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                <h5 class="font-bold text-lg">Modal Title</h5>
                                                <button type="button" class="text-white-dark hover:text-dark"
                                                    @click="toggle">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div class="mb-5" x-data="{ tab: 'home' }">
                                                    <div>
                                                        <ul
                                                            class="flex flex-wrap mt-3 border-b border-white-light dark:border-[#191e3a]">
                                                            <li>
                                                                <a href="javascript:;"
                                                                    class="p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-b-black"
                                                                    :class="{
                                                                        '!border-white-light !border-b-white  text-primary dark:!border-[#191e3a] dark:!border-b-black': tab ===
                                                                            'home'
                                                                    }"
                                                                    @click="tab = 'home'">Home</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"
                                                                    class="p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                                                    :class="{
                                                                        '!border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black': tab ===
                                                                            'profile'
                                                                    }"
                                                                    @click="tab = 'profile'">Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"
                                                                    class="p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                                                    :class="{
                                                                        '!border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black': tab ===
                                                                            'contact'
                                                                    }"
                                                                    @click="tab = 'contact'">Contact</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"
                                                                    class="p-3.5 py-2 -mb-[1px] block pointer-events-none text-white-light dark:text-dark">Disabled</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="pt-5 flex-1 text-sm">
                                                        <template x-if="tab === 'home'">
                                                            <div class="active">
                                                                <h4 class="font-semibold text-2xl mb-4">We move your
                                                                    world!</h4>
                                                                <p class="mb-4">Lorem ipsum dolor sit amet,
                                                                    consectetur adipisicing elit, sed do eiusmod tempor
                                                                    incididunt ut labore et dolore magna aliqua. Ut enim
                                                                    ad minim veniam, quis nostrud exercitation ullamco
                                                                    laboris nisi ut aliquip ex ea commodo consequat.
                                                                </p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco laboris nisi ut aliquip
                                                                    ex ea commodo consequat. </p>
                                                            </div>
                                                        </template>
                                                        <template x-if="tab === 'profile'">
                                                            <div>
                                                                <div class="flex items-start">
                                                                    <div class="w-20 h-20 ltr:mr-4 rtl:ml-4 flex-none">
                                                                        <img src="/assets/images/profile-34.jpeg"
                                                                            alt="image"
                                                                            class="w-20 h-20 m-0 rounded-full ring-4 ring-[#ebedf2] dark:ring-white-dark object-cover" />
                                                                    </div>
                                                                    <div class="flex-auto">
                                                                        <h5 class="text-xl font-medium mb-4">Media
                                                                            heading</h5>
                                                                        <p
                                                                            class="text-white-dark dark:text-white-dark/70">
                                                                            Cras sit amet nibh libero, in gravida nulla.
                                                                            Nulla vel metus scelerisque ante
                                                                            sollicitudin. Cras purus odio, vestibulum in
                                                                            vulputate at, tempus viverra turpis. Fusce
                                                                            condimentum nunc ac nisi vulputate
                                                                            fringilla. Donec lacinia congue felis in
                                                                            faucibus.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>
                                                        <template x-if="tab === 'contact'">
                                                            <div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco laboris nisi ut aliquip
                                                                    ex ea commodo consequat. Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore
                                                                    eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                    cupidatat non proident, sunt in culpa qui officia
                                                                    deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </template>
                                                        <div style="display: none;">Disabled</div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center mt-8">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        @click="toggle">Discard</button>
                                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        @click="toggle">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- profile -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-success" @click="toggle">Profile</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 p-0 rounded-lg overflow-hidden max-w-[300px] w-full bg-secondary dark:bg-secondary my-8">
                                            <div
                                                class="flex items-center justify-end pt-4 ltr:pr-4 rtl:pl-4 text-white dark:text-white-light">
                                                <button type="button" @click="toggle"
                                                    class="text-white-dark hover:text-dark">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <div class="py-5 text-white dark:text-white-light text-center">
                                                    <div class="rounded-full w-20 h-20 mx-auto mb-7 overflow-hidden">
                                                        <img src="/assets/images/profile-16.jpeg"
                                                            alt="image" class="w-full h-full object-cover" />
                                                    </div>
                                                    <p class="font-semibold">Click on view to access <br>your profile.
                                                    </p>
                                                </div>
                                                <div class="flex justify-center gap-4 p-5">
                                                    <button type="button"
                                                        class="btn bg-white text-black dark:btn-dark">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- login -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-warning" @click="toggle">Login</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                            <div
                                                class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">
                                                Login
                                                <button type="button" @click="toggle"
                                                    class="text-white-dark hover:text-dark">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <form>
                                                    <div class="relative mb-4">
                                                        <span
                                                            class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">

                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5">
                                                                <circle cx="12" cy="6"
                                                                    r="4" stroke="currentColor"
                                                                    stroke-width="1.5" />
                                                                <ellipse opacity="0.5" cx="12"
                                                                    cy="17" rx="7" ry="4"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                            </svg>
                                                        </span>
                                                        <input type="email" placeholder="Email"
                                                            class="form-input ltr:pl-10 rtl:pr-10" />
                                                    </div>
                                                    <div class="relative mb-4">
                                                        <span
                                                            class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">

                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5">
                                                                <path
                                                                    d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                                <path opacity="0.5"
                                                                    d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </span>
                                                        <input type="password" placeholder="Password"
                                                            class="form-input ltr:pl-10 rtl:pr-10" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-primary w-full">Login</button>
                                                </form>
                                            </div>
                                            <div
                                                class="my-4 text-center text-xs text-white-dark dark:text-white-dark/70">
                                                OR</div>
                                            <div class="flex items-center justify-center gap-3 mb-5">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-primary flex gap-1">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-5 h-5 shrink-0">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                        </path>
                                                    </svg>
                                                    <span>Facebook</span>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-danger flex gap-1">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-5 h-5 shrink-0">
                                                        <path
                                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                        </path>
                                                    </svg>
                                                    <span>Github</span>
                                                </a>
                                            </div>
                                            <div class="p-5 border-t border-[#ebe9f1] dark:border-white/10">
                                                <p class="text-center text-white-dark dark:text-white-dark/70">Looking
                                                    to <a href="javascript:;"
                                                        class="text-[#515365] hover:underline dark:text-white-dark">create
                                                        an account?</a></p>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Register -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-danger" @click="toggle">Register</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                            <div
                                                class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">
                                                Register
                                                <button type="button" @click="toggle"
                                                    class="text-white-dark hover:text-dark">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <form>
                                                    <div class="relative mb-4">
                                                        <span
                                                            class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">

                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5">
                                                                <circle cx="12" cy="6"
                                                                    r="4" stroke="currentColor"
                                                                    stroke-width="1.5" />
                                                                <ellipse opacity="0.5" cx="12"
                                                                    cy="17" rx="7" ry="4"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                            </svg>
                                                        </span>
                                                        <input type="text" placeholder="Name"
                                                            class="form-input ltr:pl-10 rtl:pr-10" />
                                                    </div>
                                                    <div class="relative mb-4">
                                                        <span
                                                            class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">

                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5">
                                                                <path
                                                                    d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                                <path opacity="0.5"
                                                                    d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                            </svg>
                                                        </span>
                                                        <input type="email" placeholder="Email"
                                                            class="form-input ltr:pl-10 rtl:pr-10" />
                                                    </div>
                                                    <div class="relative mb-4">
                                                        <span
                                                            class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">

                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5">
                                                                <path
                                                                    d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                                <path opacity="0.5"
                                                                    d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </span>
                                                        <input type="password" placeholder="Password"
                                                            class="form-input ltr:pl-10 rtl:pr-10" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-primary w-full">Submit</button>
                                                </form>
                                            </div>
                                            <div
                                                class="my-4 text-center text-xs text-white-dark dark:text-white-dark/70">
                                                OR</div>
                                            <div class="flex items-center justify-center gap-3 mb-5">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-primary flex gap-1">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-5 h-5 shrink-0">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                        </path>
                                                    </svg>
                                                    <span>Facebook</span>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-danger flex gap-1">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-5 h-5 shrink-0">
                                                        <path
                                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                        </path>
                                                    </svg>
                                                    <span>Github</span>
                                                </a>
                                            </div>
                                            <div class="p-5 border-t border-[#ebe9f1] dark:border-white/10">
                                                <p class="text-center text-white-dark dark:text-white-dark/70">Already
                                                    have <a href="javascript:;"
                                                        class="text-[#515365] hover:underline dark:text-white-dark">Login?</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- slider -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-secondary" @click="toggle">Slider</button>
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div x-show="open" x-transition x-transition.duration.300
                                            class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-xl my-8">
                                            <div
                                                class="flex items-center justify-between py-5 font-semibold text-lg dark:text-white">
                                                Slider
                                                <button type="button" @click="toggle"
                                                    class="text-white-dark hover:text-dark">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-6 h-6">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div id="slider1" class="swiper mb-4">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="/assets/images/carousel1.jpeg"
                                                            class="w-full" alt="image" />
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="/assets/images/carousel2.jpeg"
                                                            class="w-full" alt="image" />
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="/assets/images/carousel3.jpeg"
                                                            class="w-full" alt="image" />
                                                    </div>
                                                </div>
                                                <a href="javascript:;"
                                                    class="swiper-button-prev-ex grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 rtl:rotate-180">
                                                        <path d="M15 5L9 12L15 19" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <a href="javascript:;"
                                                    class="swiper-button-next-ex grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">

                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 ltr:rotate-180">
                                                        <path d="M15 5L9 12L15 19" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code8')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- standard  --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button  --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; @click=&quot;toggle&quot;&gt;Standard&lt;/button&gt;

        &lt;!-- modal  --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8&quot;&gt;
                    &lt;div class=&quot;flex py-2 bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-center&quot;&gt;
                        &lt;span class=&quot;flex items-center justify-center w-16 h-16 rounded-full bg-[#f1f2f3] dark:bg-white/10&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/span&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;py-5 text-white-dark text-center&quot;&gt;
                            &lt;p&gt;Vivamus vitae hendrerit neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi consequat auctor turpis, vitae dictum augue efficitur vitae. Vestibulum a risus ipsum. Quisque nec lacus dolor. Quisque ornare tempor orci id rutrum.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- tabs --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-info&quot; @click=&quot;toggle&quot;&gt;Tabs&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8&quot;&gt;
                    &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
                        &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
                        &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;mb-5&quot; x-data=&quot;{tab: 'home'}&quot;&gt;
                            &lt;div&gt;
                                &lt;ul class=&quot;flex flex-wrap mt-3 border-b border-white-light dark:border-[#191e3a]&quot;&gt;
                                    &lt;li&gt;
                                        &lt;a href=&quot;javascript:;&quot; class=&quot;p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-b-black&quot; :class=&quot;{'!border-white-light !border-b-white  text-primary dark:!border-[#191e3a] dark:!border-b-black' : tab  === 'home'}&quot; @click=&quot;tab = 'home'&quot;&gt;Home&lt;/a&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;a href=&quot;javascript:;&quot; class=&quot;p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black&quot; :class=&quot;{'!border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black' : tab  === 'profile'}&quot; @click=&quot;tab = 'profile'&quot;&gt;Profile&lt;/a&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;a href=&quot;javascript:;&quot; class=&quot;p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black&quot; :class=&quot;{'!border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black' : tab  === 'contact'}&quot; @click=&quot;tab = 'contact'&quot;&gt;Contact&lt;/a&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;a href=&quot;javascript:;&quot; class=&quot;p-3.5 py-2 -mb-[1px] block pointer-events-none text-white-light dark:text-dark&quot;&gt;Disabled&lt;/a&gt;
                                    &lt;/li&gt;
                                &lt;/ul&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;pt-5 flex-1 text-sm&quot;&gt;
                                &lt;template x-if=&quot;tab === 'home'&quot;&gt;
                                    &lt;div class=&quot;active&quot;&gt;
                                        &lt;h4 class=&quot;font-semibold text-2xl mb-4&quot;&gt;We move your world!&lt;/h4&gt;
                                        &lt;p class=&quot;mb-4&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. &lt;/p&gt;
                                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. &lt;/p&gt;
                                    &lt;/div&gt;
                                &lt;/template&gt;
                                &lt;template x-if=&quot;tab === 'profile'&quot;&gt;
                                    &lt;div&gt;
                                        &lt;div class=&quot;flex items-start&quot;&gt;
                                            &lt;div class=&quot;w-20 h-20 ltr:mr-4 rtl:ml-4 flex-none&quot;&gt;
                                            &lt;img src=&quot; /assets/images/profile-34.jpeg &quot; alt=&quot;image&quot; class=&quot;w-20 h-20 m-0 rounded-full ring-4 ring-[#ebedf2] dark:ring-white-dark object-cover&quot; /&gt;
                                            &lt;/div&gt;
                                            &lt;div class=&quot;flex-auto&quot;&gt;
                                                &lt;h5 class=&quot;text-xl font-medium mb-4&quot;&gt;Media heading&lt;/h5&gt;
                                                &lt;p class=&quot;text-white-dark dark:text-white-dark/70-dark/70&quot;&gt;Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.&lt;/p&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                &lt;/template&gt;
                                &lt;template x-if=&quot;tab === 'contact'&quot;&gt;
                                    &lt;div&gt;
                                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;
                                    &lt;/div&gt;
                                &lt;/template&gt;
                                &lt;div style=&quot;display: none;&quot;&gt;Disabled&lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- profile --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-success&quot; @click=&quot;toggle&quot;&gt;Profile&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-11/12 sm:w-[300px] bg-secondary dark:bg-secondary my-8&quot;&gt;
                    &lt;div class=&quot;flex items-center justify-end pt-4 ltr:pr-4 rtl:pl-4 text-white dark:text-white-light&quot;&gt;
                        &lt;button type=&quot;button&quot; @click=&quot;toggle&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;div class=&quot;py-5 text-white dark:text-white-light text-center&quot;&gt;
                        &lt;div class=&quot;rounded-full w-20 h-20 mx-auto mb-7 overflow-hidden&quot;&gt;&lt;img src=&quot; /assets/images/profile-16.jpeg &quot; alt=&quot;image&quot; class=&quot;w-full h-full object-cover&quot; /&gt;
                            &lt;/div&gt;
                            &lt;p class=&quot;font-semibold&quot;&gt;Click on view to access &lt;br&gt;your profile.&lt;/p&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;flex justify-center gap-4 p-5&quot;&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn bg-white text-black dark:btn-dark&quot;&gt;View&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- login --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-warning&quot; @click=&quot;toggle&quot;&gt;Login&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8&quot;&gt;
                    &lt;div class=&quot;flex items-center justify-between p-5 font-semibold text-lg dark:text-white&quot;&gt;Login
                        &lt;button type=&quot;button&quot; @click=&quot;toggle&quot; class=&quot;text-white-dark hover:text-dark&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;form&gt;
                            &lt;div class=&quot;relative mb-4&quot;&gt;
                                &lt;span class=&quot;absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark&quot;&gt;
                                    &lt;svg&gt; ... &lt;/svg&gt;
                                &lt;/span&gt;
                                &lt;input type=&quot;email&quot; placeholder=&quot;Email&quot; class=&quot;form-input ltr:pl-10 rtl:pr-10&quot; /&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;relative mb-4&quot;&gt;
                                &lt;span class=&quot;absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark&quot;&gt;
                                    &lt;svg&gt; ... &lt;/svg&gt;
                                &lt;/span&gt;
                                &lt;input type=&quot;password&quot; placeholder=&quot;Password&quot; class=&quot;form-input ltr:pl-10 rtl:pr-10&quot; /&gt;
                            &lt;/div&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary w-full&quot;&gt;Login&lt;/button&gt;
                        &lt;/form&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;my-4 text-center text-xs text-white-dark dark:text-white-dark/70&quot;&gt;OR&lt;/div&gt;
                    &lt;div class=&quot;flex items-center justify-center gap-3 mb-5&quot;&gt;
                        &lt;a href=&quot;javascript:void(0);&quot; class=&quot;btn btn-outline-primary flex gap-1&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                            &lt;span&gt;Facebook&lt;/span&gt;
                        &lt;/a&gt;
                        &lt;a href=&quot;javascript:void(0);&quot; class=&quot;btn btn-outline-danger flex gap-1&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                            &lt;span&gt;Github&lt;/span&gt;
                        &lt;/a&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5 border-t border-[#ebe9f1] dark:border-white/10&quot;&gt;
                        &lt;p class=&quot;text-center text-white-dark dark:text-white-dark/70&quot;&gt;Looking to &lt;a href=&quot;javascript:;&quot; class=&quot;text-[#515365] hover:underline dark:text-white-dark&quot;&gt;create an account?&lt;/a&gt;&lt;/p&gt;
                        &lt;/footer&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- register --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-danger&quot; @click=&quot;toggle&quot;&gt;Register&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8&quot;&gt;
                    &lt;div class=&quot;flex items-center justify-between p-5 font-semibold text-lg dark:text-white&quot;&gt;Register
                        &lt;button type=&quot;button&quot; @click=&quot;toggle&quot; class=&quot;text-white-dark hover:text-dark&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5&quot;&gt;
                        &lt;form&gt;
                            &lt;div class=&quot;relative mb-4&quot;&gt;
                                &lt;span class=&quot;absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark&quot;&gt;
                                    &lt;svg&gt; ... &lt;/svg&gt;
                                &lt;/span&gt;
                                &lt;input type=&quot;text&quot; placeholder=&quot;Name&quot; class=&quot;form-input ltr:pl-10 rtl:pr-10&quot; /&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;relative mb-4&quot;&gt;
                                &lt;span class=&quot;absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark&quot;&gt;
                                    &lt;svg&gt; ... &lt;/svg&gt;
                                &lt;/span&gt;
                                &lt;input type=&quot;email&quot; placeholder=&quot;Email&quot; class=&quot;form-input ltr:pl-10 rtl:pr-10&quot; /&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;relative mb-4&quot;&gt;
                                &lt;span class=&quot;absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark&quot;&gt;
                                    &lt;svg&gt; ... &lt;/svg&gt;
                                &lt;/span&gt;
                                &lt;input type=&quot;password&quot; placeholder=&quot;Password&quot; class=&quot;form-input ltr:pl-10 rtl:pr-10&quot; /&gt;
                            &lt;/div&gt;
                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary w-full&quot;&gt;Login&lt;/button&gt;
                        &lt;/form&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;my-4 text-center text-xs text-white-dark dark:text-white-dark/70&quot;&gt;OR&lt;/div&gt;
                    &lt;div class=&quot;flex items-center justify-center gap-3 mb-5&quot;&gt;
                        &lt;a href=&quot;javascript:void(0);&quot; class=&quot;btn btn-outline-primary flex gap-1&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                            &lt;span&gt;Facebook&lt;/span&gt;
                        &lt;/a&gt;
                        &lt;a href=&quot;javascript:void(0);&quot; class=&quot;btn btn-outline-danger flex gap-1&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                            &lt;span&gt;Github&lt;/span&gt;
                        &lt;/a&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;p-5 border-t border-[#ebe9f1] dark:border-white/10&quot;&gt;
                        &lt;p class=&quot;text-center text-white-dark dark:text-white-dark/70&quot;&gt;Already have &lt;a href=&quot;javascript:;&quot; class=&quot;text-[#515365] hover:underline dark:text-white-dark&quot;&gt;Login?&lt;/a&gt;&lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- slider --&gt;
    &lt;div x-data=&quot;modal&quot;&gt;
        &lt;!-- button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot; @click=&quot;toggle&quot;&gt;Slider&lt;/button&gt;

        &lt;!-- modal --&gt;
        &lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
            &lt;div class=&quot;flex items-start justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
                &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-xl my-8&quot;&gt;
                    &lt;div class=&quot;flex items-center justify-between p-5 font-semibold text-lg dark:text-white&quot;&gt;Slider
                        &lt;button type=&quot;button&quot; @click=&quot;toggle&quot; class=&quot;text-white-dark hover:text-dark&quot;&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div id=&quot;slider1 class=&quot;swiper mb-4&quot;&gt;
                        &lt;div class=&quot;swiper-wrapper&quot;&gt;
                            &lt;div class=&quot;swiper-slide&quot;&gt;
                            &lt;img src=&quot; /assets/images/carousel1.jpeg &quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;swiper-slide&quot;&gt;
                            &lt;img src=&quot; /assets/images/carousel2.jpeg &quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;swiper-slide&quot;&gt;
                            &lt;img src=&quot; /assets/images/carousel3.jpeg &quot; class=&quot;w-full&quot; alt=&quot;image&quot; /&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-prev-ex grid place-content-center left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
                            &lt;i class=&quot;w-5 h-5&quot;&gt;
                                &lt;svg&gt; ... &lt;/svg&gt;
                            &lt;/i&gt;
                        &lt;/a&gt;
                        &lt;a href=&quot;javascript:;&quot; class=&quot;swiper-button-next-ex grid place-content-center right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2&quot;&gt;
                            &lt;i class=&quot;w-5 h-5&quot;&gt;
                                &lt;svg&gt; ... &lt;/svg&gt;
                            &lt;/i&gt;
                        &lt;/a&gt;
                        &lt;div class=&quot;swiper-pagination&quot;&gt;&lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
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
            Alpine.data("modals", () => ({

                init() {
                    const swiper1 = new Swiper("#slider1", {
                        navigation: {
                            nextEl: '.swiper-button-next-ex',
                            prevEl: '.swiper-button-prev-ex',
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
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
