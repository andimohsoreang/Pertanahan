<x-layout.default>


    <script src="/assets/js/clipboard.min.js"></script>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Forms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Clipboard</span>
            </li>
        </ul>
        <div class="pt-5 space-y-8" x-data="form">
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://www.npmjs.com/package/clipboard"
                    target="_blank" class="block hover:underline">https://www.npmjs.com/package/clipboard</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Copy from input -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Copy from input</h5>
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
                        <div class="bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]">
                            <form>
                                <input type="text" class="form-input" x-model="message1" id="message1" />
                                <div class="flex flex-wrap gap-2 mt-5">
                                    <button type="button" class="btn btn-primary " data-clipboard-target="#message1">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Copy from Input
                                    </button>
                                    <button type="button" class="btn btn-dark " data-clipboard-action="cut"
                                        data-clipboard-target="#message1">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Cut from Input
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- copy from input --&gt;
    &lt;div x-data=&quot;form&quot; class=&quot;bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]&quot;&gt;
        &lt;form&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-input&quot; x-model=&quot;message1&quot; id=&quot;message1&quot; /&gt;
            &lt;div class=&quot;flex flex-wrap gap-2 mt-5&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-primary &quot; data-clipboard-target=&quot;#message1&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Copy from Input
                &lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-dark &quot; data-clipboard-action=&quot;cut&quot; data-clipboard-target=&quot;#message1&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Cut from Input
                &lt;/button&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        new ClipboardJS('.btn');

        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                message1: 'http://www.admin-dashboard.com',
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
                <!-- Copy form Textarea -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Copy form Textarea</h5>
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
                        <div class="bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]">
                            <form>
                                <textarea rows="3" wrap="soft" class="form-textarea" x-model="message2" id="message2"></textarea>
                                <div class="flex flex-wrap gap-2 mt-5">
                                    <button type="button" class="btn btn-primary "
                                        data-clipboard-target="#message2">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Copy from Input
                                    </button>
                                    <button type="button" class="btn btn-dark " data-clipboard-action="cut"
                                        data-clipboard-target="#message2">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Cut from Input
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- copy from textare --&gt;
    &lt;div x-data=&quot;form&quot; class=&quot;bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]&quot;&gt;
        &lt;form&gt;
            &lt;textarea rows=&quot;3&quot; wrap=&quot;soft&quot; class=&quot;form-textarea&quot; x-model=&quot;message2&quot; id=&quot;message2&quot;&gt;&lt;/textarea&gt;
            &lt;div class=&quot;flex flex-wrap gap-2 mt-5&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-primary &quot; data-clipboard-target=&quot;#message2&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Copy from Input
                &lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-dark &quot; data-clipboard-action=&quot;cut&quot; data-clipboard-target=&quot;#message2&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Cut from Input
                &lt;/button&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        new ClipboardJS('.btn');

        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                message2: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
                <!-- Copy Text from Paragraph -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Copy Text from Paragraph</h5>
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
                        <div class="bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]">
                            <form>
                                <p class="mb-3 font-semibold">Here is your OTP <span class="text-2xl"
                                        id="copyOTP">22991</span>.</p>
                                <p class="font-semibold">Please do not share it to anyone</p>
                                <div class="flex flex-wrap gap-2 mt-5">
                                    <button type="button" class="btn btn-primary" data-clipboard-target="#copyOTP">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Copy from Paragraph
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- copy from paragraph --&gt;
    &lt;div class=&quot;bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]&quot;&gt;
        &lt;form&gt;
            &lt;p class=&quot;mb-3 font-semibold&quot;&gt;Here is your OTP &lt;span class=&quot;text-2xl&quot; id=&quot;copyOTP&quot;&gt;22991&lt;/span&gt;.&lt;/p&gt;
            &lt;p class=&quot;font-semibold&quot;&gt;Please do not share it to anyone&lt;/p&gt;
            &lt;div class=&quot;flex flex-wrap gap-2 mt-5&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; data-clipboard-target=&quot;#copyOTP&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Copy from Paragraph
                &lt;/button&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
    </pre>
                    </template>
                </div>
                <!-- Advanced -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Copy Hidden Text (Advanced)</h5>
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
                        <div class="bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]">
                            <form>
                                <p class="mb-3 font-semibold"> <span> Link -> </span> <span id="copyLink">
                                        http://www.admin-dashboard.com/code</span></p>
                                <span class="absolute opacity-0" id="copyHiddenCode">2291</span>
                                <div class="flex flex-wrap gap-2 mt-5">
                                    <button type="button" class="btn btn-primary "
                                        data-clipboard-target="#copyLink">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Copy Link
                                    </button>
                                    <button type="button" class="btn btn-dark "
                                        data-clipboard-target="#copyHiddenCode">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                            <path
                                                d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        Copy Hidden Code
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- advanced --&gt;
    &lt;div class=&quot;bg-[#f1f2f3] p-5 rounded dark:bg-[#060818]&quot;&gt;
        &lt;form&gt;
            &lt;p class=&quot;mb-3 font-semibold&quot;&gt; &lt;span&gt; Link -&gt; &lt;/span&gt; &lt;span id=&quot;copyLink&quot;&gt; http://www.admin-dashboard.com/code&lt;/span&gt;&lt;/p&gt;
            &lt;span class=&quot;absolute opacity-0&quot; id=&quot;copyHiddenCode&quot;&gt;2291&lt;/span&gt;
            &lt;div class=&quot;flex flex-wrap gap-2 mt-5&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-primary &quot; data-clipboard-target=&quot;#copyLink&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Copy Link
                &lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-dark &quot; data-clipboard-target=&quot;#copyHiddenCode&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Copy Hidden Code
                &lt;/button&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
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
        new ClipboardJS('.btn');

        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                message1: 'http://www.admin-dashboard.com',
                message2: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',

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
