<x-layout.default>


    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Forms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Select2</span>
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a
                    href="https://www.npmjs.com/package/nice-select2" target="_blank"
                    class="block hover:underline">https://www.npmjs.com/package/nice-select2</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Basic -->
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
                    <div class="mb-5">
                        <select class="selectize">
                            <option selected value="orange">Orange</option>
                            <option value="White">White</option>
                            <option value="Purple">Purple</option>
                        </select>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;select class=&quot;selectize&quot;&gt;
        &lt;option selected value=&quot;orange&quot;&gt;Orange&lt;/option&gt;
        &lt;option value=&quot;White&quot;&gt;White&lt;/option&gt;
        &lt;option value=&quot;Purple&quot;&gt;Purple&lt;/option&gt;
    &lt;/select&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;DOMContentLoaded&quot;, function(e) {
            // default
            var els = document.querySelectorAll(&quot;.selectize&quot;);
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Nested -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Nested</h5>
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
                    <div class="mb-5">
                        <select class="selectize">
                            <option disabled>Group 1</option>
                            <option selected value="orange">Orange</option>
                            <option value="White">White</option>
                            <option value="Purple">Purple</option>
                            <option disabled>Group 2</option>
                            <option>Yellow</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option disabled>Group 3</option>
                            <option>Aqua</option>
                            <option value="Black">Black</option>
                            <option value="Blue">Blue</option>
                        </select>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- nested --&gt;
    &lt;select class=&quot;selectize&quot;&gt;
        &lt;option disabled&gt;Group 1&lt;/option&gt;
        &lt;option selected value=&quot;orange&quot;&gt;Orange&lt;/option&gt;
        &lt;option value=&quot;White&quot;&gt;White&lt;/option&gt;
        &lt;option value=&quot;Purple&quot;&gt;Purple&lt;/option&gt;
        &lt;option disabled&gt;Group 2&lt;/option&gt;
        &lt;option&gt;Yellow&lt;/option&gt;
        &lt;option value=&quot;Red&quot;&gt;Red&lt;/option&gt;
        &lt;option value=&quot;Green&quot;&gt;Green&lt;/option&gt;
        &lt;option disabled&gt;Group 3&lt;/option&gt;
        &lt;option&gt;Aqua&lt;/option&gt;
        &lt;option value=&quot;Black&quot;&gt;Black&lt;/option&gt;
        &lt;option value=&quot;Blue&quot;&gt;Blue&lt;/option&gt;
    &lt;/select&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;DOMContentLoaded&quot;, function(e) {
            // default
            var els = document.querySelectorAll(&quot;.selectize&quot;);
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Disabling options -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Disabling options</h5>
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
                    <div class="mb-5">
                        <select class="selectize">
                            <option selected value="orange">Orange</option>
                            <option disabled value="White">White</option>
                            <option value="Purple">Purple</option>
                        </select>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- disabling options --&gt;
    &lt;select class=&quot;selectize&quot;&gt;
        &lt;option selected value=&quot;orange&quot;&gt;Orange&lt;/option&gt;
        &lt;option disabled value=&quot;White&quot;&gt;White&lt;/option&gt;
        &lt;option value=&quot;Purple&quot;&gt;Purple&lt;/option&gt;
    &lt;/select&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;DOMContentLoaded&quot;, function(e) {
            // default
            var els = document.querySelectorAll(&quot;.selectize&quot;);
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Placeholder -->
                <div class="panel lg:row-start-3">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Placeholder</h5>
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
                    <div class="mb-5">
                        <select class="selectize" placeholder="Choose...">
                            <option value="orange">Orange</option>
                            <option value="White">White</option>
                            <option value="Purple">Purple</option>
                        </select>
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- placeholder --&gt;
    &lt;select class=&quot;selectize&quot; placeholder=&quot;Choose...&quot;&gt;
        &lt;option value=&quot;orange&quot;&gt;Orange&lt;/option&gt;
        &lt;option value=&quot;White&quot;&gt;White&lt;/option&gt;
        &lt;option value=&quot;Purple&quot;&gt;Purple&lt;/option&gt;
    &lt;/select&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;DOMContentLoaded&quot;, function(e) {
            // default
            var els = document.querySelectorAll(&quot;.selectize&quot;);
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Searchable -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Searchable</h5>
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
                        <select id="seachable-select">
                            <option value="orange">Orange</option>
                            <option value="White">White</option>
                            <option value="Purple">Purple</option>
                        </select>
                    </div>
                    <template x-if="codeArr.includes('code5')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- searchable --&gt;
    &lt;select id=&quot;seachable-select&quot;&gt;
        &lt;option value=&quot;orange&quot;&gt;Orange&lt;/option&gt;
        &lt;option value=&quot;White&quot;&gt;White&lt;/option&gt;
        &lt;option value=&quot;Purple&quot;&gt;Purple&lt;/option&gt;
    &lt;/select&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;DOMContentLoaded&quot;, function(e) {
            // seachable
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById(&quot;seachable-select&quot;), options);
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Multiple -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Multiple select</h5>
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
                    <div class="mb-5">
                        <select class="selectize" multiple='multiple'>
                            <option value="orange">Orange</option>
                            <option value="White">White</option>
                            <option value="Purple">Purple</option>
                        </select>
                    </div>
                    <template x-if="codeArr.includes('code6')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- multiple --&gt;
    &lt;select class=&quot;selectize&quot; multiple='multiple'&gt;
        &lt;option value=&quot;orange&quot;&gt;Orange&lt;/option&gt;
        &lt;option value=&quot;White&quot;&gt;White&lt;/option&gt;
    &lt;/select&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;DOMContentLoaded&quot;, function(e) {
            // default
            var els = document.querySelectorAll(&quot;.selectize&quot;);
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
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

    <script src="/assets/js/nice-select2.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });

            // seachable
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("seachable-select"), options);
        });

        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({

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
