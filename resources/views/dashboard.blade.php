<x-app-layout>





    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <div >

        <main>



            <!-- Content header -->
            <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
              <h1 class="text-2xl font-semibold">Dashboard</h1>
              {{-- <a
                href="https://github.com/Kamona-WD/kwd-dashboard"
                target="_blank"
                class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
              >
                View on github
              </a> --}}
            </div>

            <!-- Content -->
            <div class="mt-2">
              <!-- State cards -->
              <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
                <!-- Value card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Value
                    </h6>
                    <span class="text-xl font-semibold">$30,000</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +4.4%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Users card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Users
                    </h6>
                    <span class="text-xl font-semibold">50,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +2.6%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Orders card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Orders
                    </h6>
                    <span class="text-xl font-semibold">45,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +3.1%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                        />
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Tickets card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Tickets
                    </h6>
                    <span class="text-xl font-semibold">20,516</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +3.1%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"
                        />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>

              <!-- Charts -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                    <div class="flex items-center space-x-2">
                      <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                      <button
                        class="relative focus:outline-none"
                        x-cloak
                        @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                      >
                        <div
                          class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                        ></div>
                        <div
                          class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                          :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                        ></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>

                <!-- Doughnut chart card -->
                <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                    <div class="flex items-center">
                      <button
                        class="relative focus:outline-none"
                        x-cloak
                        @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)"
                      >
                        <div
                          class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                        ></div>
                        <div
                          class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                          :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                        ></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72">
                    <canvas id="doughnutChart"></canvas>
                  </div>
                </div>
              </div>

              <!-- Two grid columns -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Active users chart -->
                <div class="col-span-1 bg-white rounded-md dark:bg-darker">
                  <!-- Card header -->
                  <div class="p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Active users right now</h4>
                  </div>
                  <p class="p-4">
                    <span class="text-2xl font-medium text-gray-500 dark:text-light" id="usersCount">0</span>
                    <span class="text-sm font-medium text-gray-500 dark:text-primary">Users</span>
                  </p>
                  <!-- Chart -->
                  <div class="relative p-4">
                    <canvas id="activeUsersChart"></canvas>
                  </div>
                </div>

                <!-- Line chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Line Chart</h4>
                    <div class="flex items-center">
                      <button
                        class="relative focus:outline-none"
                        x-cloak
                        @click="isOn = !isOn; $parent.updateLineChart()"
                      >
                        <div
                          class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                        ></div>
                        <div
                          class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                          :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                        ></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </main>
          <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
          <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
          <script>
            // All javascript code in this project for now is just for demo DON'T RELY ON IT

    const random = (max = 100) => {
      return Math.round(Math.random() * max) + 20
    }

    const randomData = () => {
      return [
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
        random(),
      ]
    }

    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

    const cssColors = (color) => {
      return getComputedStyle(document.documentElement).getPropertyValue(color)
    }

    const getColor = () => {
      return window.localStorage.getItem('color') ?? 'cyan'
    }

    const colors = {
      primary: cssColors(`--color-${getColor()}`),
      primaryLight: cssColors(`--color-${getColor()}-light`),
      primaryLighter: cssColors(`--color-${getColor()}-lighter`),
      primaryDark: cssColors(`--color-${getColor()}-dark`),
      primaryDarker: cssColors(`--color-${getColor()}-darker`),
    }

    const barChart = new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels: months,
        datasets: [
          {
            data: randomData(),
            backgroundColor: colors.primary,
            hoverBackgroundColor: colors.primaryDark,
          },
        ],
      },
      options: {
        scales: {
          yAxes: [
            {
              gridLines: false,
              ticks: {
                beginAtZero: true,
                stepSize: 50,
                fontSize: 12,
                fontColor: '#97a4af',
                fontFamily: 'Open Sans, sans-serif',
                padding: 10,
              },
            },
          ],
          xAxes: [
            {
              gridLines: false,
              ticks: {
                fontSize: 12,
                fontColor: '#97a4af',
                fontFamily: 'Open Sans, sans-serif',
                padding: 5,
              },
              categoryPercentage: 0.5,
              maxBarThickness: '10',
            },
          ],
        },
        cornerRadius: 2,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
      },
    })

    const doughnutChart = new Chart(document.getElementById('doughnutChart'), {
      type: 'doughnut',
      data: {
        labels: ['Oct', 'Nov', 'Dec'],
        datasets: [
          {
            data: [random(), random(), random()],
            backgroundColor: [colors.primary, colors.primaryLighter, colors.primaryLight],
            hoverBackgroundColor: colors.primaryDark,
            borderWidth: 0,
            weight: 0.5,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'bottom',
        },

        title: {
          display: false,
        },
        animation: {
          animateScale: true,
          animateRotate: true,
        },
      },
    })

    const activeUsersChart = new Chart(document.getElementById('activeUsersChart'), {
      type: 'bar',
      data: {
        labels: [...randomData(), ...randomData()],
        datasets: [
          {
            data: [...randomData(), ...randomData()],
            backgroundColor: colors.primary,
            borderWidth: 0,
            categoryPercentage: 1,
          },
        ],
      },
      options: {
        scales: {
          yAxes: [
            {
              display: false,
              gridLines: false,
            },
          ],
          xAxes: [
            {
              display: false,
              gridLines: false,
            },
          ],
          ticks: {
            padding: 10,
          },
        },
        cornerRadius: 2,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          prefix: 'Users',
          bodySpacing: 4,
          footerSpacing: 4,
          hasIndicator: true,
          mode: 'index',
          intersect: true,
        },
        hover: {
          mode: 'nearest',
          intersect: true,
        },
      },
    })

    const lineChart = new Chart(document.getElementById('lineChart'), {
      type: 'line',
      data: {
        labels: months,
        datasets: [
          {
            data: randomData(),
            fill: false,
            borderColor: colors.primary,
            borderWidth: 2,
            pointRadius: 0,
            pointHoverRadius: 0,
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          yAxes: [
            {
              gridLines: false,
              ticks: {
                beginAtZero: false,
                stepSize: 50,
                fontSize: 12,
                fontColor: '#97a4af',
                fontFamily: 'Open Sans, sans-serif',
                padding: 20,
              },
            },
          ],
          xAxes: [
            {
              gridLines: false,
            },
          ],
        },
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          hasIndicator: true,
          intersect: false,
        },
      },
    })

    let randomUserCount = 0

    const usersCount = document.getElementById('usersCount')

    const fakeUsersCount = () => {
      randomUserCount = random()
      activeUsersChart.data.datasets[0].data.push(randomUserCount)
      activeUsersChart.data.datasets[0].data.splice(0, 1)
      activeUsersChart.update()
      usersCount.innerText = randomUserCount
    }

    setInterval(() => {
      fakeUsersCount()
    }, 1000)

          </script>
            <script>
                const setup = () => {
                  const getTheme = () => {
                    if (window.localStorage.getItem('dark')) {
                      return JSON.parse(window.localStorage.getItem('dark'))
                    }

                    return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
                  }

                  const setTheme = (value) => {
                    window.localStorage.setItem('dark', value)
                  }

                  const getColor = () => {
                    if (window.localStorage.getItem('color')) {
                      return window.localStorage.getItem('color')
                    }
                    return 'cyan'
                  }

                  const setColors = (color) => {
                    const root = document.documentElement
                    root.style.setProperty('--color-primary', `var(--color-${color})`)
                    root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
                    root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
                    root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
                    root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
                    root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
                    root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
                    this.selectedColor = color
                    window.localStorage.setItem('color', color)
                    //
                  }

                  const updateBarChart = (on) => {
                    const data = {
                      data: randomData(),
                      backgroundColor: 'rgb(207, 250, 254)',
                    }
                    if (on) {
                      barChart.data.datasets.push(data)
                      barChart.update()
                    } else {
                      barChart.data.datasets.splice(1)
                      barChart.update()
                    }
                  }

                  const updateDoughnutChart = (on) => {
                    const data = random()
                    const color = 'rgb(207, 250, 254)'
                    if (on) {
                      doughnutChart.data.labels.unshift('Seb')
                      doughnutChart.data.datasets[0].data.unshift(data)
                      doughnutChart.data.datasets[0].backgroundColor.unshift(color)
                      doughnutChart.update()
                    } else {
                      doughnutChart.data.labels.splice(0, 1)
                      doughnutChart.data.datasets[0].data.splice(0, 1)
                      doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
                      doughnutChart.update()
                    }
                  }

                  const updateLineChart = () => {
                    lineChart.data.datasets[0].data.reverse()
                    lineChart.update()
                  }

                  return {
                    loading: true,
                    isDark: getTheme(),
                    toggleTheme() {
                      this.isDark = !this.isDark
                      setTheme(this.isDark)
                    },
                    setLightTheme() {
                      this.isDark = false
                      setTheme(this.isDark)
                    },
                    setDarkTheme() {
                      this.isDark = true
                      setTheme(this.isDark)
                    },
                    color: getColor(),
                    selectedColor: 'cyan',
                    setColors,
                    toggleSidbarMenu() {
                      this.isSidebarOpen = !this.isSidebarOpen
                    },
                    isSettingsPanelOpen: false,
                    openSettingsPanel() {
                      this.isSettingsPanelOpen = true
                      this.$nextTick(() => {
                        this.$refs.settingsPanel.focus()
                      })
                    },
                    isNotificationsPanelOpen: false,
                    openNotificationsPanel() {
                      this.isNotificationsPanelOpen = true
                      this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                      })
                    },
                    isSearchPanelOpen: false,
                    openSearchPanel() {
                      this.isSearchPanelOpen = true
                      this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                      })
                    },
                    isMobileSubMenuOpen: false,
                    openMobileSubMenu() {
                      this.isMobileSubMenuOpen = true
                      this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                      })
                    },
                    isMobileMainMenuOpen: false,
                    openMobileMainMenu() {
                      this.isMobileMainMenuOpen = true
                      this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                      })
                    },
                    updateBarChart,
                    updateDoughnutChart,
                    updateLineChart,
                  }
                }
              </script>

            </main>
    </div>
     @livewireScripts


    </x-app-layout>
