<x-layout.default>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <div x-data="basic">
        <ul class="flex space-x-2 rtl:space-x-reverse mb-6">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Drag & Drop</span>
            </li>
        </ul>

        <div class="dragndrop space-y-8">
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://www.npmjs.com/package/sortablejs"
                    target="_blank" class="block hover:underline">https://www.npmjs.com/package/sortablejs</a>
            </div>

            <!-- Sortable -->
            <div class="panel">
                <div class="font-semibold text-lg mb-5">Sortable</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                    <div>
                        <ul id="example1">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base" x-text="item.text">
                                                </div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-secondary btn-sm px-5 py-2">View</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div>
                        <ul id="example2">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id + 5}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base" x-text="item.text">
                                                </div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-secondary btn-sm px-5 py-2">View</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Icon Change -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">Icon Change</div>
                <div class="icon-change grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                    <div>
                        <ul id="example3" class="left">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:text-left rtl:text-right items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id}.jpeg`"
                                                class="w-11 h-11 rounded-full" />
                                        </div>
                                        <div class="flex justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base" x-text="item.text">
                                                </div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                            <div class="text-white-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 feather-star">
                                                    <path
                                                        d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 feather-heart">
                                                    <path
                                                        d="M12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path opacity="0.5"
                                                        d="M12 5.50063C16.4998 0.825464 22 4.27416 22 9.1371C22 14 17.9806 16.5914 15.0383 18.9109C14 19.7294 13 20.5 12 20.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div>
                        <ul id="example4" class="right">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:text-left rtl:text-right items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id + 5}.jpeg`"
                                                class="w-11 h-11 rounded-full" />
                                        </div>
                                        <div class="flex justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                            <div class="text-white-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6 feather-star">
                                                    <path
                                                        d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6 feather-heart">
                                                    <path
                                                        d="M12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path opacity="0.5"
                                                        d="M12 5.50063C16.4998 0.825464 22 4.27416 22 9.1371C22 14 17.9806 16.5914 15.0383 18.9109C14 19.7294 13 20.5 12 20.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Handler -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">Handler</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                    <div>
                        <ul id="example5">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="sm:flex block justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                            <div class="text-white-dark">
                                                <span
                                                    class="handle px-2 ltr:mr-1 rtl:ml-1 bg-[#ebedf2] dark:bg-black rounded cursor-move">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div>
                        <ul id="example6">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id + 5}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="sm:flex block justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                            <div class="text-white-dark">
                                                <span
                                                    class="handle px-2 ltr:mr-1 rtl:ml-1 bg-[#ebedf2] dark:bg-black rounded cursor-move">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Multiple Drag -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">Multiple Drag</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                    <div>
                        <ul id="example7">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div>
                        <ul id="example8">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id + 5}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- News feed -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">News Feed</div>
                <div>
                    <div id="example12" class="grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                        <template x-for="item in items">
                            <div class="mb-2.5" x-show="item.id <= 4">
                                <div
                                    class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5">
                                    <div
                                        class="py-sm-2.5 sm:flex block ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id +1}.jpeg`"
                                                class="w-11 h-11 rounded-lg mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.name"></div>
                                                <div class="text-white-dark text-xs">11 hours ago</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 border-b border-b-[#f1f2f3] dark:border-b-dark mb-4">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation.
                                    </div>
                                    <div class="md:flex items-center flex-wrap">
                                        <div class="ltr:md:text-left rtl:md:text-right text-center xl:flex-1">
                                            <div
                                                class="flex md:justify-start justify-center -space-x-2 rtl:space-x-reverse text-white">
                                                <img class="w-10 h-10 rounded-full object-cover ring-2 ring-white dark:ring-white-dark"
                                                    src="/assets/images/profile-6.jpeg"
                                                    alt="image" />
                                                <img class="w-10 h-10 rounded-full object-cover ring-2 ring-white dark:ring-white-dark"
                                                    src="/assets/images/profile-7.jpeg"
                                                    alt="image" />
                                                <img class="w-10 h-10 rounded-full object-cover ring-2 ring-white dark:ring-white-dark"
                                                    src="/assets/images/profile-8.jpeg"
                                                    alt="image" />
                                                <img class="w-10 h-10 rounded-full object-cover ring-2 ring-white dark:ring-white-dark"
                                                    src="/assets/images/profile-10.jpeg"
                                                    alt="image" />
                                            </div>
                                        </div>
                                        <div class="ltr:md:text-right rtl:md:text-left text-center">
                                            <span class="text-xs text-white-dark lg:pt-0 pt-2 block"><a
                                                    href="javascript:;"
                                                    class="text-danger dark:text-primary font-semibold text-sm">Vincent,
                                                    Mary</a> and 19 other like this</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Delete User -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">Delete User</div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12">
                    <div>
                        <ul id="example13">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div>
                        <ul id="example14">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id + 5}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Grid drag -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">Grid drag</div>
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 xl:grid-cols-8 gap-8 place-items-center"
                    id="example11">
                    <template x-for="i in 12">
                        <div class="w-24 h-24 border border-white-light rounded-md shadow dark:border-dark flex items-center justify-center font-semibold cursor-grab"
                            x-text="'Item ' + i"></div>
                    </template>
                </div>
            </div>

            <!-- Swap -->
            <div class="panel">
                <div class="font-semibold text-lg dark:text-white mb-5">Swap</div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12">
                    <div>
                        <ul id="example9">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div>
                        <ul id="example10">
                            <template x-for="item in items">
                                <li class="mb-2.5 cursor-grab">
                                    <div
                                        class="bg-white dark:bg-[#1b2e4b] rounded-md border border-white-light dark:border-dark px-6 py-3.5 flex md:flex-row flex-col ltr:md:text-left rtl:md:text-right text-center items-md-center">
                                        <div class="ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img alt="avatar"
                                                :src="`/assets/images/profile-${item.id + 5}.jpeg`"
                                                class="w-11 h-11 rounded-full mx-auto" />
                                        </div>
                                        <div class="flex md:flex-row flex-col justify-between items-center flex-1">
                                            <div class="font-semibold md:my-0 my-3">
                                                <div class="text-dark dark:text-[#bfc9d4] text-base"
                                                    x-text="item.text"></div>
                                                <div class="text-white-dark text-xs" x-text="item.name"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Basic
        var example1 = document.getElementById('example1');
        var sortable = Sortable.create(example1, {
            animation: 200,
            ghostClass: 'gu-transit',
            group: 'shared',
        });
        var example2 = document.getElementById('example2');
        var sortable = Sortable.create(example2, {
            animation: 200,
            ghostClass: 'gu-transit',
            group: 'shared'
        });

        // Icon change
        var example3 = document.getElementById('example3');
        var sortable = Sortable.create(example3, {
            animation: 200,
            ghostClass: 'gu-transit',
            group: 'icon'
        });
        var example4 = document.getElementById('example4');
        var sortable = Sortable.create(example4, {
            animation: 200,
            ghostClass: 'gu-transit',
            group: 'icon'
        });

        // Handler
        var example5 = document.getElementById('example5');
        var sortable = Sortable.create(example5, {
            animation: 200,
            handle: '.handle',
            group: 'handler',
            ghostClass: 'gu-transit',
        });
        var example6 = document.getElementById('example6');
        var sortable = Sortable.create(example6, {
            animation: 200,
            handle: '.handle',
            group: 'handler',
            ghostClass: 'gu-transit',
        });

        //Multiple Drag
        var example7 = document.getElementById('example7');
        var sortable = Sortable.create(example7, {
            animation: 200,
            group: 'multiple',
            multiDrag: true,
            selectedClass: 'selected',
            fallbackTolerance: 3,
            ghostClass: 'gu-transit',
        });
        var example8 = document.getElementById('example8');
        var sortable = Sortable.create(example8, {
            animation: 200,
            group: 'multiple',
            multiDrag: true,
            selectedClass: 'selected',
            fallbackTolerance: 3,
            ghostClass: 'gu-transit',
        });

        //Delete User
        var example13 = document.getElementById('example13');
        var sortable = Sortable.create(example13, {
            animation: 200,
            group: 'delete',
            removeOnSpill: true,
        });
        var example14 = document.getElementById('example14');
        var sortable = Sortable.create(example14, {
            animation: 200,
            group: 'delete',
            removeOnSpill: true,
        });

        //News Feed
        var example12 = document.getElementById('example12');
        var sortable = Sortable.create(example12, {
            animation: 200,
        });

        //Swap
        var example9 = document.getElementById('example9');
        var sortable = Sortable.create(example9, {
            animation: 200,
            group: 'swap',
            swap: true,
        });
        var example10 = document.getElementById('example10');
        var sortable = Sortable.create(example10, {
            animation: 200,
            group: 'swap',
            swap: true,
        });

        //Grid drag
        var example11 = document.getElementById('example11');
        var sortable = Sortable.create(example11, {
            animation: 200,
        });

        document.addEventListener("alpine:init", () => {
            Alpine.data("basic", () => ({
                items: [{
                        id: 1,
                        text: 'Need to be approved',
                        name: 'Kelly Young'
                    },
                    {
                        id: 2,
                        text: 'Meeting with client',
                        name: 'Andy King'
                    },
                    {
                        id: 3,
                        text: 'Project Detail',
                        name: 'Judy Holmes'
                    },
                    {
                        id: 4,
                        text: 'Edited Post Apporval',
                        name: 'Vincent Carpenter'
                    },
                    {
                        id: 5,
                        text: 'Project Lead Pickup',
                        name: 'Mary McDonald'
                    },
                ],
            }));
        });
    </script>
</x-layout.default>
