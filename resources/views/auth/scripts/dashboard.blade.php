@if (auth()->check())
    @php
        $labelGauge = 'Organisasi Mahasiswa';
    @endphp
@elseif (auth('organisasi')->check())
    @php
        $labelGauge = 'Program Kerja';
    @endphp
@endif

<script>
    (function() {
        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        const chartPrestasiStatistik = document.querySelector('#prestasiChart');
        const chartBeasiswaStatistik = document.querySelector('#beasiswaChart');
        const chartKonselingStatistik = document.querySelector('#konselingChart');
        const chartLogbook = document.querySelector('#chartLogbook');
        const chartGaugeTransaksi = document.querySelector('#gaugeTransaksi');

        fetch('/{{ request()->segment(1) }}/{{ request()->segment(2) }}/chart')
            .then(response => response.json())
            .then(data => {
                // Configuration for the donut chart
                const colorMap = {
                    'olahraga': '#FFAB00',
                    'sains': '#71dd37',
                    'seni': '#696CFF'
                };

                const defaultColor = '#00CFE8'; // warna untuk "lainnya" / yang tidak dikenali
                const colors = data.jenis_prestasi.map(label => colorMap[label.toLowerCase()] || defaultColor);

                const prestasiChartConfig = {
                    chart: {
                        height: 165,
                        width: 130,
                        type: 'donut'
                    },
                    labels: data.jenis_prestasi,
                    series: data.jumlah_prestasi,
                    colors: colors,
                    stroke: {
                        width: 5,
                        colors: cardColor
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function(val, opt) {
                            return parseInt(val);
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            right: 15
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '1.5rem',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        offsetY: -15,
                                        formatter: function(val) {
                                            return parseInt(val);
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '0.8125rem',
                                        color: axisColor,
                                        label: 'Prestasi',
                                        formatter: function(w) {
                                            return parseInt(data.total_prestasi);
                                        }
                                    }
                                }
                            }
                        }
                    }
                };

                const beasiswaChartConfig = {
                    chart: {
                        height: 165,
                        width: 130,
                        type: 'donut'
                    },
                    labels: data.jenis_beasiswa,
                    series: data.jumlah_beasiswa,
                    colors: ['#696CFF', '#71dd37', ],
                    stroke: {
                        width: 5,
                        colors: cardColor
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function(val, opt) {
                            return parseInt(val);
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            right: 15
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '1.5rem',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        offsetY: -15,
                                        formatter: function(val) {
                                            return parseInt(val);
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '0.8125rem',
                                        color: axisColor,
                                        label: 'Beasiswa',
                                        formatter: function(w) {
                                            return parseInt(data.total_beasiswa);
                                        }
                                    }
                                }
                            }
                        }
                    }
                };

                const konselingChartConfig = {
                    chart: {
                        height: 165,
                        width: 130,
                        type: 'donut'
                    },
                    labels: data.status_konseling,
                    series: data.jumlah_konseling,
                    colors: ['#FF3E01', '#696CFF'],
                    stroke: {
                        width: 5,
                        colors: cardColor
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function(val, opt) {
                            return parseInt(val);
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            right: 15
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '1.5rem',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        offsetY: -15,
                                        formatter: function(val) {
                                            return parseInt(val);
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '0.8125rem',
                                        color: axisColor,
                                        label: 'Mahasiswa',
                                        formatter: function(w) {
                                            return parseInt(data.total_konseling);
                                        }
                                    }
                                }
                            }
                        }
                    }
                };

                const updateKegiatanSeries = data.update_kegiatan.map((jumlah, index) => ({
                    x: data.update_kegiatan_tanggal[index],
                    y: jumlah
                }));

                const updateDanaSeries = data.update_dana.map((jumlah, index) => ({
                    x: data.update_dana_tanggal[index],
                    y: jumlah
                }));

                console.log(updateKegiatanSeries);

                const logbookChartConfig = {
                    series: [{
                        name: 'Pengajuan Kegiatan',
                        data: updateKegiatanSeries, // Format yang benar
                        color: '#ff3e1d'
                    }, {
                        name: 'Pengajuan Dana',
                        data: updateDanaSeries, // Format yang benar
                        color: '#696cff'
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        labels: {
                            format: "yyyy-MM-dd"
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yyyy'
                        },
                        y: {
                            formatter: function(val) {
                                return Math.round(val); // Menghapus desimal .0
                            }
                        }
                    },
                };

                const gaugeTransaksiConfig = {

                    series: [data.total_organisasi],
                    chart: {
                        height: 200,
                        type: 'radialBar',
                        offsetY: -10
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {
                                    fontSize: '16px',
                                    color: undefined,
                                    offsetY: 120
                                },
                                value: {
                                    offsetY: 76,
                                    fontSize: '22px',
                                    color: undefined,
                                    formatter: function(val) {
                                        return val;
                                    }
                                }
                            }
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            shadeIntensity: 0.15,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        },
                    },
                    stroke: {
                        dashArray: 4
                    },
                    labels: ["{{ $labelGauge }}"],

                };

                if (typeof chartPrestasiStatistik !== undefined && chartPrestasiStatistik !== null) {
                    const prestasiStatistik = new ApexCharts(chartPrestasiStatistik, prestasiChartConfig);
                    prestasiStatistik.render();
                }
                if (typeof chartBeasiswaStatistik !== undefined && chartBeasiswaStatistik !== null) {
                    const beasiswaStatistik = new ApexCharts(chartBeasiswaStatistik, beasiswaChartConfig);
                    beasiswaStatistik.render();
                }
                if (typeof chartKonselingStatistik !== undefined && chartKonselingStatistik !== null) {
                    const konselingStatistik = new ApexCharts(chartKonselingStatistik, konselingChartConfig);
                    konselingStatistik.render();
                }

                if (typeof chartLogbook !== undefined && chartLogbook !== null) {
                    const logbookChart = new ApexCharts(chartLogbook, logbookChartConfig);
                    logbookChart.render();
                }

                if (typeof chartGaugeTransaksi !== undefined && chartGaugeTransaksi !== null) {
                    const gaugeTransaksi = new ApexCharts(chartGaugeTransaksi, gaugeTransaksiConfig);
                    gaugeTransaksi.render();
                }

            })
            .catch(error => console.error('Error fetching data:', error));
    })();
</script>
