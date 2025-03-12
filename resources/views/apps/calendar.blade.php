<x-layout.default>

    <link href="{{ Vite::asset('resources/css/fullcalendar.min.css') }}" rel='stylesheet' />
    <script src='/assets/js/fullcalendar.min.js'></script>
    <div x-data="calendar">
        <div class="panel">
            <div class="mb-5">
                <div class="mb-4 flex items-center sm:flex-row flex-col sm:justify-between justify-center">
                    <div class="sm:mb-0 mb-4">
                        <div class="text-lg font-semibold ltr:sm:text-left rtl:sm:text-right text-center">Calendar</div>
                        <div class="flex items-center mt-2 flex-wrap sm:justify-start justify-center">
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-primary"></div>
                                <div>Work</div>
                            </div>
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-info"></div>
                                <div>Travel</div>
                            </div>
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-success"></div>
                                <div>Personal</div>
                            </div>
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-danger"></div>
                                <div>Important</div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" @click="editEvent()">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Create Event
                    </button>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                        :class="isAddEventModal && '!block'">
                        <div class="flex items-center justify-center min-h-screen px-4"
                            @click.self="isAddEventModal = false">
                            <div x-show="isAddEventModal" x-transition x-transition.duration.300
                                class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                <button type="button"
                                    class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                    @click="isAddEventModal = false">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                    x-text="params.id ? 'Edit Event' : 'Add Event'"></h3>
                                <div class="p-5">
                                    <form @submit.prevent="saveEvent">
                                        <div class="mb-5">
                                            <label for="title">Event Title :</label>
                                            <input id="title" type="text" name="title" id="title"
                                                class="form-input" placeholder="Enter Event Title"
                                                x-model="params.title" required />
                                            <div class="text-danger mt-2" id="titleErr"></div>
                                        </div>

                                        <div class="mb-5">
                                            <label for="dateStart">From :</label>
                                            <input id="dateStart" type="datetime-local" name="start" id="start"
                                                class="form-input" placeholder="Event Start Date" x-model="params.start"
                                                :min="minStartDate" @change="startDateChange($event)" required />
                                            <div class="text-danger mt-2" id="startDateErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="dateEnd">To :</label>
                                            <input id="dateEnd" type="datetime-local" name="end" id="end"
                                                class="form-input" placeholder="Event End Date" x-model="params.end"
                                                :min="minEndDate" required />
                                            <div class="text-danger mt-2" id="endDateErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="description">Event Description :</label>
                                            <textarea id="description" name="description" id="description" class="form-textarea min-h-[130px]"
                                                placeholder="Enter Event Description" x-model="params.description"></textarea>
                                        </div>
                                        <div class="mb-5">
                                            <label>Badge:</label>
                                            <div class="mt-3">
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input type="radio" class="form-radio" name="badge"
                                                        value="primary" x-model="params.type" />
                                                    <span class="ltr:pl-2 rtl:pr-2">Work</span>
                                                </label>
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input type="radio" class="form-radio text-info" name="badge"
                                                        value="info" x-model="params.type" />
                                                    <span class="ltr:pl-2 rtl:pr-2">Travel</span>
                                                </label>
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input type="radio" class="form-radio text-success"
                                                        name="badge" value="success" x-model="params.type" />
                                                    <span class="ltr:pl-2 rtl:pr-2">Personal</span>
                                                </label>
                                                <label class="inline-flex cursor-pointer">
                                                    <input type="radio" class="form-radio text-danger"
                                                        name="badge" value="danger" x-model="params.type" />
                                                    <span class="ltr:pl-2 rtl:pr-2">Important</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="isAddEventModal = false">Cancel</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                x-text="params.id ? 'Update Event' : 'Create Event'"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar-wrapper" id='calendar'></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("calendar", () => ({
                defaultParams: ({
                    id: null,
                    title: '',
                    start: '',
                    end: '',
                    description: '',
                    type: 'primary'
                }),
                params: {
                    id: null,
                    title: '',
                    start: '',
                    end: '',
                    description: '',
                    type: 'primary'
                },
                isAddEventModal: false,
                minStartDate: '',
                minEndDate: '',
                calendar: null,
                now: new Date(),
                events: [],
                init() {
                    this.events = [{
                            id: 1,
                            title: 'All Day Event',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-01T14:30:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-02T14:30:00',
                            className: 'danger',
                            description: 'Aenean fermentum quam vel sapien rutrum cursus. Vestibulum imperdiet finibus odio, nec tincidunt felis facilisis eu.',
                        },
                        {
                            id: 2,
                            title: 'Site Visit',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-07T19:30:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-08T14:30:00',
                            className: 'primary',
                            description: 'Etiam a odio eget enim aliquet laoreet. Vivamus auctor nunc ultrices varius lobortis.',
                        },
                        {
                            id: 3,
                            title: 'Product Lunching Event',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-17T14:30:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-18T14:30:00',
                            className: 'info',
                            description: 'Proin et consectetur nibh. Mauris et mollis purus. Ut nec tincidunt lacus. Nam at rutrum justo, vitae egestas dolor.',
                        },
                        {
                            id: 4,
                            title: 'Meeting',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-12T10:30:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-13T10:30:00',
                            className: 'danger',
                            description: 'Mauris ut mauris aliquam, fringilla sapien et, dignissim nisl. Pellentesque ornare velit non mollis fringilla.',
                        },
                        {
                            id: 5,
                            title: 'Lunch',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-12T15:00:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-13T15:00:00',
                            className: 'info',
                            description: 'Integer fermentum bibendum elit in egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
                        },
                        {
                            id: 6,
                            title: 'Conference',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-12T21:30:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-13T21:30:00',
                            className: 'success',
                            description: 'Curabitur facilisis vel elit sed dapibus. Nunc sagittis ex nec ante facilisis, sed sodales purus rhoncus. Donec est sapien, porttitor et feugiat sed, eleifend quis sapien. Sed sit amet maximus dolor.',
                        },
                        {
                            id: 7,
                            title: 'Happy Hour',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-12T05:30:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-13T05:30:00',
                            className: 'info',
                            description: ' odio lectus, porttitor molestie scelerisque blandit, hendrerit sed ex. Aenean malesuada iaculis erat, vitae blandit nisl accumsan ut.',
                        },
                        {
                            id: 8,
                            title: 'Dinner',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-12T20:00:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-13T20:00:00',
                            className: 'danger',
                            description: 'Sed purus urna, aliquam et pharetra ut, efficitur id mi. Pellentesque ut convallis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        },
                        {
                            id: 9,
                            title: 'Birthday Party',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-27T20:00:00',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now) +
                                '-28T20:00:00',
                            className: 'success',
                            description: 'Sed purus urna, aliquam et pharetra ut, efficitur id mi. Pellentesque ut convallis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        },
                        {
                            id: 10,
                            title: 'New Talent Event',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now, 1) +
                                '-24T08:12:14',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now, 1) +
                                '-27T22:20:20',
                            className: 'danger',
                            description: 'Sed purus urna, aliquam et pharetra ut, efficitur id mi. Pellentesque ut convallis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        },
                        {
                            id: 11,
                            title: 'Other new',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now, -1) +
                                '-13T08:12:14',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now, -1) +
                                '-16T22:20:20',
                            className: 'primary',
                            description: 'Pellentesque ut convallis velit. Sed purus urna, aliquam et pharetra ut, efficitur id mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        },
                        {
                            id: 13,
                            title: 'Upcoming Event',
                            start: this.now.getFullYear() + '-' + this.getMonth(this.now, 1) +
                                '-15T08:12:14',
                            end: this.now.getFullYear() + '-' + this.getMonth(this.now, 1) +
                                '-18T22:20:20',
                            className: 'primary',
                            description: 'Pellentesque ut convallis velit. Sed purus urna, aliquam et pharetra ut, efficitur id mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        },
                    ];
                    var calendarEl = document.getElementById('calendar');
                    this.calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay',
                        },
                        editable: true,
                        dayMaxEvents: true,
                        selectable: true,
                        droppable: true,
                        eventClick: (event) => {
                            this.editEvent(event);
                        },
                        select: (event) => {
                            this.editDate(event)
                        },
                        events: this.events,
                    });
                    this.calendar.render();

                    this.$watch('$store.app.sidebar', () => {
                        setTimeout(() => {
                            this.calendar.render();
                        }, 300);
                    });
                },

                getMonth(dt, add = 0) {
                    let month = dt.getMonth() + 1 + add;
                    return dt.getMonth() < 10 ? '0' + month : month;
                },

                editEvent(data) {
                    this.params = JSON.parse(JSON.stringify(this.defaultParams));
                    if (data) {
                        let obj = JSON.parse(JSON.stringify(data.event));
                        this.params = {
                            id: obj.id ? obj.id : null,
                            title: obj.title ? obj.title : null,
                            start: this.dateFormat(obj.start),
                            end: this.dateFormat(obj.end),
                            type: obj.classNames ? obj.classNames[0] : 'primary',
                            description: obj.extendedProps ? obj.extendedProps.description : '',
                        };
                        this.minStartDate = new Date();
                        this.minEndDate = this.dateFormat(obj.start);
                    } else {
                        this.minStartDate = new Date();
                        this.minEndDate = new Date();
                    }

                    this.isAddEventModal = true;
                },

                editDate(data) {
                    let obj = {
                        event: {
                            start: data.start,
                            end: data.end
                        },
                    };
                    this.editEvent(obj);
                },

                dateFormat(dt) {
                    dt = new Date(dt);
                    const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() +
                    1;
                    const date = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                    const hours = dt.getHours() < 10 ? '0' + dt.getHours() : dt.getHours();
                    const mins = dt.getMinutes() < 10 ? '0' + dt.getMinutes() : dt.getMinutes();
                    dt = dt.getFullYear() + '-' + month + '-' + date + 'T' + hours + ':' + mins;
                    return dt;
                },

                saveEvent() {
                    if (!this.params.title) {
                        return true;
                    }
                    if (!this.params.start) {
                        return true;
                    }
                    if (!this.params.end) {
                        return true;
                    }

                    if (this.params.id) {
                        //update event
                        let event = this.events.find((d) => d.id == this.params.id);
                        event.title = this.params.title;
                        event.start = this.params.start;
                        event.end = this.params.end;
                        event.description = this.params.description;
                        event.className = this.params.type;
                    } else {
                        //add event
                        let maxEventId = 0;
                        if (this.events) {
                            maxEventId = this.events.reduce(
                                (max, character) => (character.id > max ? character.id : max),
                                this.events[0].id
                            );
                        }

                        let event = {
                            id: maxEventId + 1,
                            title: this.params.title,
                            start: this.params.start,
                            end: this.params.end,
                            description: this.params.description,
                            className: this.params.type,
                        };
                        this.events.push(event);
                    }
                    this.calendar.getEventSources()[0].refetch() //refresh Calendar
                    this.showMessage('Event has been saved successfully.');
                    this.isAddEventModal = false;
                },

                startDateChange(event) {
                    const dateStr = event.target.value;
                    if (dateStr) {
                        this.minEndDate = this.dateFormat(dateStr);
                        this.params.end = '';
                    }
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                }
            }));
        });
    </script>

</x-layout.default>
