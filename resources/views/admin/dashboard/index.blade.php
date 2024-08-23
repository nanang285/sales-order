@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')
            <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-6 my-6">
                <div class="flex justify-between mb-6">
                    <div>
                        <h3 class="text-blue-700 text-lg font-semibold"><i class="fa-solid fa-caret-right"></i>&nbsp;Data Rekrutmen Masuk</h3>
                    </div>
                </div>
                <hr>
                <div class="mt-6" id="data-labels-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5">
                    <div class="flex justify-between items-center pt-5">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            Last 7 days
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        90 days</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                            Sales Report
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <script>
                const options = {
                    dataLabels: {
                        enabled: true,
                        style: {
                            cssClass: 'text-xs text-white font-medium'
                        },
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 16,
                            right: 16,
                            top: -26
                        },
                    },
                    series: [{
                            name: "Project Manager",
                            data: [14, 13, 15, 14, 13, 14],
                            color: "#1A56DB",
                        },
                        {
                            name: "Frontend Developer",
                            data: [11, 12, 13, 11, 12, 13],
                            color: "#7E3BF2",
                        },
                        {
                            name: "Backend Developer",
                            data: [12, 12, 14, 13, 12, 13],
                            color: "#F97316",
                        },
                        {
                            name: "UI/UX Developer",
                            data: [9, 11, 10, 12, 11, 10],
                            color: "#14B8A6",
                        },
                        {
                            name: "Fullstack Developer",
                            data: [15, 14, 13, 13, 14, 15],
                            color: "#DB2777",
                        },
                        {
                            name: "Mobile Developer",
                            data: [10, 15, 12, 12, 18, 14],
                            color: "#3B82F6",
                        },
                        {
                            name: "DevOps Developer",
                            data: [12, 18, 15, 10, 10, 15],
                            color: "#EC4899",
                        },
                        {
                            name: "Quality Assurance",
                            data: [10, 10, 15, 18, 12, 10],
                            color: "#F59E0B",
                        },
                        {
                            name: "Quality Control",
                            data: [9, 9, 10, 10, 15, 15],
                            color: "#10B981",
                        },
                        {
                            name: "Accounting Staff / Tax Staff",
                            data: [5, 9, 8, 9, 9, 8],
                            color: "#8B5CF6",
                        }
                    ],


                    chart: {
                        height: "100%",
                        maxWidth: "100%",
                        type: "area",
                        fontFamily: "Inter, sans-serif",
                        dropShadow: {
                            enabled: false,
                        },
                        toolbar: {
                            show: false,
                        },
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    legend: {
                        show: true
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            opacityFrom: 0.55,
                            opacityTo: 0,
                            shade: "#1C64F2",
                            gradientToColors: ["#1C64F2"],
                        },
                    },
                    stroke: {
                        width: 6,
                    },
                    xaxis: {
                        categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February',
                            '07 February'
                        ],
                        labels: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                        labels: {
                            formatter: function(value) {
                                return value;
                            }
                        }
                    },
                }

                if (document.getElementById("data-labels-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("data-labels-chart"), options);
                    chart.render();
                }
            </script>
        </div>
    </div>
@endsection
