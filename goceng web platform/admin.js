$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$( $(document).ready(function(){
        //setup search autosubmit
        $('.input-filter-income').on('change', function() {
            $('.form-filter-income').submit();
        });
        $('.input-filter-outlay').on('change', function() {
            $('.form-filter-outlay').submit();
        });

        $('.input-filter-transfer').on('change', function() {
            $('.form-filter-transfer').submit();
        });

        //prefix price format
        $('.priceFormatPerfix').priceFormat({
			prefix: 'Rp. ',
			centsSeparator: '',
			thousandsSeparator: '.',
			centsLimit: 0,
			limit: 15
        });
        
        $('.transaction-tab').each(function(e){

            $(this).on('click', function(){
                if ($(this).attr('data-table') == 'list') {
                    $('.tl-content').css('display','block');
                    $('.tr-content').css('display','none');
                } else {
                    $('.tl-content').css('display','none');
                    $('.tr-content').css('display','block');
                }
            });
        });
    });

	var icons = [];

    //income category
	$('#income_category_form').submit(function() {
		var request = $(this).serializeArray();
		$.ajax({
			url: 'transaksi/dashboard/add_new_category',
			data: request,
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$('#div_alert_income_modal').css('display', 'none');
				if (data.status == 201) {
					$('#income_select').html(data.data.html);
					$('#income_select').val(data.data.selected_value).trigger('change');
					loadIcons('add-new-income-category', 'icon_id_income');
					$('#income_category_form :input[name=icon]').val('');
					$('#income_category_form :input[name=name]').val('');
					$('#income_category_form :input[name=kategori_induk]').val(103).trigger('change');
					$('#add_new_income_category').modal('toggle');
				} else {
					$('#alert_income_modal').removeClass();
					$('#alert_income_modal').addClass('alert alert-danger');
					$('#div_alert_income_modal').css('display', 'block');
					$('#alert_income_modal').html(data.message);
				}
			}
		});
		return false;

	});

    //outlay category
	$('#outlay_category_form').submit(function() {
		var request = $(this).serializeArray();
		$.ajax({
			url: 'transaksi/dashboard/add_new_category',
			data: request,
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status == 201) {
					$('#outlay_select').html(data.data.html);
					$('#outlay_select').val(data.data.selected_value).trigger('change');
					loadIcons('add-new-outlay-category', 'icon_id_outlay');
					$('#outlay_category_form :input[name=icon]').val('');
					$('#outlay_category_form :input[name=name]').val('');
					$('#outlay_category_form :input[name=kategori_induk]').val(172).trigger('change');
					$('#add_new_outlay_category').modal('toggle');
				} else {
					$('#alert_outlay_modal').removeClass();
					$('#alert_outlay_modal').addClass('alert alert-danger');
					$('#div_alert_outlay_modal').css('display', 'inherit');
					$('#alert_outlay_modal').html(data.message);
				}
			}
		});
		return false;

	});

    //check condition period
	function check_pemasukan_periode() {
		if ($("#pemasukan_berulang").is(':checked') == true) {
			$(".pemasukan_berulang_opsi").show('slow');
		} else {
			$(".pemasukan_berulang_opsi").hide('slow');
		}
	}

	function check_pemasukan_periode_custom() {
		if ($("#pemasukan_berulang_custom").is(':checked') == true) {
			$(".custom_pemasukan_opsi").show('slow');
		} else {
			$(".custom_pemasukan_opsi").hide('slow');
		}
	}
	$('#pemasukan_berulang').click(function() {
		check_pemasukan_periode();
	});
	$('.pemasukan_berulang_custom').click(function() {
		check_pemasukan_periode_custom();
	});
	check_pemasukan_periode();
	check_pemasukan_periode_custom();

	function check_pengeluaran_periode() {
		if ($("#pengeluaran_berulang").is(':checked') == true) {
			$(".pengeluaran_berulang_opsi").show('slow');
		} else {
			$(".pengeluaran_berulang_opsi").hide('slow');
		}
	}

	function check_pengeluaran_periode_custom() {
		if ($("#pengeluaran_berulang_custom").is(':checked') == true) {
			$(".custom_pengeluaran_opsi").show('slow');
		} else {
			$(".custom_pengeluaran_opsi").hide('slow');
		}
	}
	$('#pengeluaran_berulang').click(function() {
		check_pengeluaran_periode();
	});
	$('.pengeluaran_berulang_custom').click(function() {
		check_pengeluaran_periode_custom();
	});
	check_pengeluaran_periode();
	check_pengeluaran_periode_custom();

	function check_transfer_periode() {
		if ($("#transfer_berulang").is(':checked') == true) {
			$(".transfer_berulang_opsi").show('slow');
		} else {
			$(".transfer_berulang_opsi").hide('slow');
		}
	}

	function check_transfer_periode_custom() {
		if ($("#transfer_berulang_custom").is(':checked') == true) {
			$(".custom_transfer_opsi").show('slow');
		} else {
			$(".custom_transfer_opsi").hide('slow');
		}
	}
	$('#transfer_berulang').click(function() {
		check_transfer_periode();
	});
	$('.transfer_berulang_custom').click(function() {
		check_transfer_periode_custom();
	});
	check_transfer_periode();
	check_transfer_periode_custom();

    //load icons
	function loadIcons(id_div, id_select) {
		var iconSelect;
		var iconId;

		iconId = document.getElementById(id_select);

		document.getElementById(id_div).addEventListener('changed', function(e) {
			iconId.value = iconSelect.getSelectedValue();
		});

		iconSelect = new IconSelect(id_div, {
			'selectedIconWidth': 24,
			'selectedIconHeight': 24,
			'selectedBoxPadding': 1,
			'iconsWidth': 31,
			'iconsHeight': 31,
			'boxIconSpace': 1,
			'vectoralIconNumber': 4,
			'horizontalIconNumber': 6
		});

		iconSelect.refresh(icons);
	}

	window.onload = function() {
		icons.push({
			'iconFilePath': 'assets/article_categories/ic_default_category.png',
			'iconValue': ''
		});
		$.ajax({
			'url': 'apps_api/transaksi/liststockicon',
			'type': 'GET',
			'dataType': 'json',
			'async': false,
			success: function(data) {
				for (var i = 0; i < data.length; ++i) {
					var obj = data[i];
					icons.push({
						'iconFilePath': 'assets/article_categories/' + obj.name + '?v=' + (new Date()).getTime(),
						'iconValue': obj.name
					});
				}
			}
		});

		loadIcons('add-new-income-category', 'icon_id_income');
		loadIcons('add-new-outlay-category', 'icon_id_outlay');
	};

    //print transaction
	function printTrx(type_file, form_name) {
		var date = $('#' + form_name + ' :input[name=' + form_name + ']').val();
		var split = date.split(' - ');

        var start =  split[0].split('/');
        var start_date = start[2]+'/'+start[1]+'/'+start[0];
        var start_date_without_symbol = start_date.replace('/', '');

        var end =  split[1].split('/');
        var end_date = end[2]+'/'+end[1]+'/'+end[0];

		window.open('https://aplikasi.finansialku.com/transaksi/dashboard/print_transaction?type_file=' + type_file + '&start_date=' + start_date + '&end_date=' + end_date, '_blank');


    }

    //form submit
    $('#formPemasukan').on('submit', function(e){
        formTransaction('formPemasukan');
        e.preventDefault();
    });

    $('#formPengeluaran').on('submit', function(e){
        formTransaction('formPengeluaran');
        e.preventDefault();
    });

    $('#formTransfer').on('submit', function(e){
        formTransaction('formTransfer');
        e.preventDefault();
    });

    $('#formBerulang').on('submit', function(e){
        formTransaction('formBerulang');
        e.preventDefault();
    });

    
    //setup form submit
    function formTransaction(el){
        $(".msg_area").html("").hide("slow");
        var formID = el;
        var source_select = $("#"+formID+" .source_select option:selected").html();
        var escape_string_id = "'.$escape_string_id.'";

        if ($("#" + formID).find("input[name=tipe_transaksi]").val() == "berulang")
            var amount = $("#" + formID).find("input[name=nominal_transaksi_berulang]").unmask();
        else
            var amount = $("#" + formID).find("input[name=jumlah_pemasukan]").unmask();
        
        if (amount == 0) {
            $("#transaction-page-notification").html(`
                <div class="alert alert-danger alert-auto-close"><div class="alert-has-icon"><img src="themes/user-v2/img/icon/ic_info_danger_outline.svg" alt=""><p>Jumlah tidak boleh 0</p></div></div>
            `)
            alertAutoClose();
            $("#transaction-page-notification").hide().show("slow");
            return false
        }

        disload(".panel-loading","block");
        var data = $("#"+formID).serialize();

        $.ajax({
            type: "POST",
            url: "https://aplikasi.finansialku.com/transaksi/dashboard?proses="+formID+"&source_select="+source_select+"&edit="+escape_string_id,
            data: data,
            dataType: "text",
            success: function(data) {
                //$(".msg_area").html(data);
                disload(".panel-loading","unblock");
                window.location.href = data;
            },
            error: function() {
            }
        });

        $(".msg_area").hide().show("slow");
        $("html, body").animate({ scrollTop: 0 }, "slow");

        return false;
    };

    $('.transfer_from').on('change', function(){
        var select = $('option:selected', this);
        $(".transfer_to option").removeAttr('selected');
        $(".transfer_to").val('');
        value = select.val();
        console.log();
        if (value != '') {
            $(".transfer_to").removeAttr('disabled');
            $(".transfer_to option").removeAttr('disabled');
            $(".transfer_to option[value='" + value + "']").attr('disabled',true);
        } else {
            $(".transfer_to option").removeAttr('disabled');
            $(".transfer_to").attr('disabled','disabled');
        }
    });

    function alertAutoClose()
    {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    }

    alertAutoClose();

	mixpanel.track("Transaksi");
	//transaction repeat, tr
    var url_del = 'https://aplikasi.finansialku.com/transaksi/dashboard';
    var url_redirect = 'https://aplikasi.finansialku.com/transaksi/dashboard?active=perulangan';
    $(function() {
        $("#repeat-list").on("click", '.transaction_repeat', function(){
            var data_delete_repeat = $(this).data("id");
            swal({
                title: "Apakah anda yakin?",
                text: "Data tidak akan bisa di kembalikan lagi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Ya, Hapus data!",
                cancelButtonText: "Tidak, Batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $('.sa-button-container').find('.cancel').hide();
                    $('.sa-confirm-button-container').find('.confirm').attr('disabled');
                    $('.sa-confirm-button-container').find('.confirm').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
                    $.ajax({
                        type: "GET",
                        url: url_del+'?id_transaction_repeat='+data_delete_repeat,
                        dataType: "text",
                        success: function(data) {
                            //$(".msg_area").html(data);
                            //disload(".panel-loading","unblock");
                            swal({
                                title: "Data di hapus!",
                                text: "Akun anda telah dihapus.",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                            function wait() {
                                //location.reload();
                                window.location.replace("https://aplikasi.finansialku.com/transaksi/dashboard?active=" + data);
                            }
                            setTimeout(wait, 1000);
                        },
                        error: function() {}
                    });
                } else {
                    swal({
                        title: "Dibatalkan",
                        text: "File anda tidak di hapus :)",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });
        });
    });

    //transaction list, tl
    $(function() {
        $("#transaction-list").on("click", '.alert_delete', function(){
            var data_delete = $(this).data("id");
            $('.sa-confirm-button-container').find('.confirm').removeAttr('disabled');
            swal({
                title: "Apakah anda yakin?",
                text: "Data tidak akan bisa di kembalikan lagi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Ya, Hapus data!",
                cancelButtonText: "Tidak, Batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $('.sa-button-container').find('.cancel').hide();
                    $('.sa-confirm-button-container').find('.confirm').attr('disabled');
                    $('.sa-confirm-button-container').find('.confirm').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
                    $.ajax({
                        type: "GET",
                        url: "https://aplikasi.finansialku.com/transaksi/dashboard/hapus" + "/" + data_delete,
                        dataType: "text",
                        success: function(data) {
                            //$(".msg_area").html(data);
                            //disload(".panel-loading","unblock");
                            swal({
                                title: "Data di hapus!",
                                text: "Akun anda telah dihapus.",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                            function wait() {
                                //location.reload();
                                window.location.replace("https://aplikasi.finansialku.com/transaksi/dashboard?active=" + data);
                            }
                            setTimeout(wait, 1000);
                        },
                        error: function() {}
                    });
                } else {
                    swal({
                        title: "Dibatalkan",
                        text: "File anda tidak di hapus :)",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });
        });
    });

    $(".kategori_pemasukan").select2({
								templateResult: addUserPic,
								templateSelection: addUserPic
							});
	
							function addUserPic(opt) {
								if (!opt.id) {
									return opt.text;
								}
								var optimage = $(opt.element).data('image');
								if (!optimage) {
									return opt.text;
								} else {
									if ($(opt.element).data('child')) {
										var $opt = $(
											'<span><img src="' + optimage + '" class="userPic select2-icon-item select2-child" />' + $(opt.element).text() + '</span>'
										);
									} else {
										var $opt = $(
											'<span><img src="' + optimage + '" class="userPic select2-icon-item" />' + $(opt.element).text() + '</span>'
										);
									}
									return $opt;
								}
							};

 <script type="text/javascript">
        $(document).ready(function() {
            var inflasitahunan = 10;
            var estimasihasilinvestasi = 12;
            var lama_pensiun = 30;
            $("#inflasi_tahunan").val(inflasitahunan);
            $("#estimasi_hasil_investasi").val(estimasihasilinvestasi);
            $("#kenaikan_biaya_pertahun").val(inflasitahunan);
            $("#imbal_hasil_investasi").val(estimasihasilinvestasi);
            $("#lama_pensiun").val(lama_pensiun);
        });

        function tanggalunmask(tgl) {
            var tgl = tgl;
            tgl = tgl.replace("Januari", "01");
            tgl = tgl.replace("Februari", "02");
            tgl = tgl.replace("Maret", "03");
            tgl = tgl.replace("April", "04");
            tgl = tgl.replace("Mei", "05");
            tgl = tgl.replace("Juni", "06");
            tgl = tgl.replace("Juli", "07");
            tgl = tgl.replace("Agustus", "08");
            tgl = tgl.replace("September", "09");
            tgl = tgl.replace("Oktober", "10");
            tgl = tgl.replace("November", "11");
            tgl = tgl.replace("Desember", "12");
            tgl = tgl.replace(",", "");
            tgl = tgl.split(' ');

            var tgl = new Date(tgl[2], tgl[1], tgl[0]);
            var tgl_tgl = new Date(tgl.getFullYear() + 10, tgl.getMonth(), tgl.getDate());

            return tgl_tgl;
        }

        function tanggal_unmask(tgl) {
            var tgl = tgl;
            tgl = tgl.replace("Januari", "01");
            tgl = tgl.replace("Februari", "02");
            tgl = tgl.replace("Maret", "03");
            tgl = tgl.replace("April", "04");
            tgl = tgl.replace("Mei", "05");
            tgl = tgl.replace("Juni", "06");
            tgl = tgl.replace("Juli", "07");
            tgl = tgl.replace("Agustus", "08");
            tgl = tgl.replace("September", "09");
            tgl = tgl.replace("Oktober", "10");
            tgl = tgl.replace("November", "11");
            tgl = tgl.replace("Desember", "12");
            tgl = tgl.replace(",", "");
            tgl = tgl.split(' ');
            tgl = tgl[2] + '-' + tgl[1] + '-' + tgl[0];

            return tgl;
        }

        function daysBetween(date2, date1) {
            //Get 1 day in milliseconds
            var one_day = 1000 * 60 * 60 * 24;

            // Convert both dates to milliseconds
            var date1_ms = date1.getTime();
            var date2_ms = date2.getTime();

            // Calculate the difference in milliseconds
            var difference_ms = date2_ms - date1_ms;

            // Convert back to days and return
            return Math.round(difference_ms / one_day);
        }

        function priceclean(price) {
            var price = price;
            price = price.replace("Rp.", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace(".", "");
            price = price.replace("%", "");
            price = price.replace(",", ".");
            price = eval(price.trim());
            return price;
        }

        function percenclean(price) {
            var price = price;
            price = price.replace(",", ".");
            price = price.replace("%", "");
            price = eval(price.trim());
            return price;
        }

        function numclean(price) {
            var price = price;
            price = price.replace("Rp", "");
            price = price.replace(".", "");
            price = price.replace(",", "");
            price = price.replace("%", "");
            price = eval(price.trim());
            return price;
        }

        function disload(el, unblock) {
            var block = $(el);
            if (unblock == "unblock") {
                $(block).unblock();
            } else {
                $(block).block({
                    message: '<i class="icon-spinner4 spinner"></i>',
                    overlayCSS: {
                        backgroundColor: '#fff',
                        opacity: 0.8,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                });
            }
        }

        function getRandomInt(min, max) {
            // Create byte array and fill with 1 random number
            var byteArray = new Uint8Array(1);
            window.crypto.getRandomValues(byteArray);

            // Convert to decimal
            var randomNum = '0.' + byteArray[0].toString();

            // Get number in range
            randomNum = Math.floor(randomNum * (max - min + 1)) + min;

            return randomNum;
        }

        function PV(rate, periods, payment, future, type) {
            // Initialize type
            var type = (typeof type === 'undefined') ? 0 : type;

            // Evaluate rate and periods (TODO: replace with secure expression evaluator)
            rate = eval(rate);
            periods = eval(periods);

            // Return present value
            if (rate === 0) {
                return -payment * periods - future;
            } else {
                return (((1 - Math.pow(1 + rate, periods)) / rate) * payment * (1 + rate * type) - future) / Math.pow(1 + rate, periods);
            }
        }

        function FV(rate, nper, pmt, pv, type) {
            var pow = Math.pow(1 + rate, nper),
                fv;
            if (rate) {
                fv = (pmt * (1 + rate * type) * (1 - pow) / rate) - pv * pow;
            } else {
                fv = -1 * (pv + pmt * nper);
            }
            return fv.toFixed(2);
        }

        function PMT(rate_per_period, number_of_payments, present_value, future_value, type) {
            if (rate_per_period != 0.0) {
                // Interest rate exists
                var q = Math.pow(1 + rate_per_period, number_of_payments);
                return -(rate_per_period * (future_value + (q * present_value))) / ((-1 + q) * (1 + rate_per_period * (type)));

            } else if (number_of_payments != 0.0) {
                // No interest rate, but number of payments exists
                return -(future_value + present_value) / number_of_payments;
            }

            return 0;
        }
        //js function
                $(function() {
            
            function progressCounter(element, radius, border, color, end, iconClass, textTitle, textAverage) {
                var d3Container = d3.select(element),
                    startPercent = 0,
                    iconSize = 32,
                    endPercent = end,
                    twoPi = Math.PI * 2,
                    formatPercent = d3.format('.0%'),
                    boxSize = radius * 2;
                var count = Math.abs((endPercent - startPercent) / 0.01);
                var step = endPercent < startPercent ? -0.01 : 0.01;
                var container = d3Container.append('svg');
                var svg = container
                    .attr('width', boxSize)
                    .attr('height', boxSize)
                    .append('g')
                    .attr('transform', 'translate(' + (boxSize / 2) + ',' + (boxSize / 2) + ')');
                var arc = d3.svg.arc()
                    .startAngle(0)
                    .innerRadius(radius)
                    .outerRadius(radius - border);
                svg.append('path')
                    .attr('class', 'd3-progress-background')
                    .attr('d', arc.endAngle(twoPi))
                    .style('fill', '#eee');
                var foreground = svg.append('path')
                    .attr('class', 'd3-progress-foreground')
                    .attr('filter', 'url(#blur)')
                    .style('fill', color)
                    .style('stroke', color);
                var front = svg.append('path')
                    .attr('class', 'd3-progress-front')
                    .style('fill', color)
                    .style('fill-opacity', 1);
                /*
                var numberText = d3.select(element)
                	.append('h2')
                		.attr('class', 'mt-15 mb-5')
                */
                var numberText = d3.select(element)
                    .append("span")
                    .attr("class", " counter-icon")
                    .attr('style', 'font-size:20px; top: ' + ((boxSize - iconSize) / 2) + 'px');
                d3.select(element)
                    .append('div')
                    .text(textTitle);
                d3.select(element)
                    .append('div')
                    .attr('class', 'text-size-small text-muted')
                    .text(textAverage);

                function updateProgress(progress) {
                    foreground.attr('d', arc.endAngle(twoPi * progress));
                    front.attr('d', arc.endAngle(twoPi * progress));
                    numberText.text(formatPercent(progress));
                }
                var progress = startPercent;
                (function loops() {
                    updateProgress(progress);
                    if (count > 0) {
                        count--;
                        progress += step;
                        setTimeout(loops, 10);
                    }
                })();
            }
        });
        //js write
        $(document).ready(function() {
                        $('.priceFormatPerfix').priceFormat({
                prefix: 'Rp. ',
                centsSeparator: '',
                thousandsSeparator: '.',
                centsLimit: 0,
                limit: 15
            });
            $('.priceFormatPerfixCent').priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 2
            });
            $('.priceFormat').priceFormat({
                prefix: '',
                centsSeparator: '',
                thousandsSeparator: '.',
                centsLimit: 0
            });
            $('.priceCmaFormatPerfix').priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 2
            });
            $('.priceCmaFormat').priceFormat({
                prefix: '',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 2
            });

            $('.unitFormat').priceFormat({
                prefix: '',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 2
            });
        });
    </script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-83304013-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!--Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110091938-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-110091938-1');
    </script>

    <!-- start Mixpanel -->
    <script type="text/javascript">
        (function(e, a) {
            if (!a.__SV) {
                var b = window;
                try {
                    var c, l, i, j = b.location,
                        g = j.hash;
                    c = function(a, b) {
                        return (l = a.match(RegExp(b + "=([^&]*)"))) ? l[1] : null
                    };
                    g && c(g, "state") && (i = JSON.parse(decodeURIComponent(c(g, "state"))), "mpeditor" === i.action && (b.sessionStorage.setItem("_mpcehash", g), history.replaceState(i.desiredHash || "", e.title, j.pathname + j.search)))
                } catch (m) {}
                var k, h;
                window.mixpanel = a;
                a._i = [];
                a.init = function(b, c, f) {
                    function e(b, a) {
                        var c = a.split(".");
                        2 == c.length && (b = b[c[0]], a = c[1]);
                        b[a] = function() {
                            b.push([a].concat(Array.prototype.slice.call(arguments,
                                0)))
                        }
                    }
                    var d = a;
                    "undefined" !== typeof f ? d = a[f] = [] : f = "mixpanel";
                    d.people = d.people || [];
                    d.toString = function(b) {
                        var a = "mixpanel";
                        "mixpanel" !== f && (a += "." + f);
                        b || (a += " (stub)");
                        return a
                    };
                    d.people.toString = function() {
                        return d.toString(1) + ".people (stub)"
                    };
                    k = "disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
                    for (h = 0; h < k.length; h++) e(d, k[h]);
                    a._i.push([b, c, f])
                };
                a.__SV = 1.2;
                b = e.createElement("script");
                b.type = "text/javascript";
                b.async = !0;
                b.src = "undefined" !== typeof MIXPANEL_CUSTOM_LIB_URL ? MIXPANEL_CUSTOM_LIB_URL : "file:" === e.location.protocol && "//cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//) ? "https://cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js" : "//cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js";
                c = e.getElementsByTagName("script")[0];
                c.parentNode.insertBefore(b, c)
            }
        })(document, window.mixpanel || []);
        mixpanel.init("bcb81b460076a92d7ff4ddff36038c21");
    
    	<script>
								$(document).ready(function() {
									$("#dari_transfer").hide();
									$("#ke_transfer").hide();
									$("#kategori_pemasukan").hide();
									$("#ke_pemasukan").hide();
									$("#kategori_pengeluaran").hide();
									$("#dari_pengeluaran").hide();
									$("#periode_tahun").hide();
									$("#periode_bulan").hide();
									$("#periode_hari").hide();
									$("#maks_transaksi").hide();
									$("#maks_transaksi_berulang").val(0);
	
									$("#jenis_transaksi_berulang").on("change", function() {
										if (this.value == "pemasukan") {
											$("#dari_transfer").hide();
											$("#ke_transfer").hide();
											$("#kategori_pengeluaran").hide();
											$("#dari_pengeluaran").hide();
											$("#kategori_pemasukan").fadeIn("slow");
											$("#ke_pemasukan").fadeIn("slow");
										} else if (this.value == "pengeluaran") {
											$("#dari_transfer").hide();
											$("#ke_transfer").hide();
											$("#kategori_pemasukan").hide();
											$("#ke_pemasukan").hide();
											$("#kategori_pengeluaran").fadeIn("slow");
											$("#dari_pengeluaran").fadeIn("slow");
										} else if (this.value == "transfer") {
											$("#kategori_pemasukan").hide();
											$("#ke_pemasukan").hide();
											$("#kategori_pengeluaran").hide();
											$("#dari_pengeluaran").hide();
											$("#dari_transfer").fadeIn("slow");
											$("#ke_transfer").fadeIn("slow");
										}
									});
									$('#periode').on('change', function() {
										if (this.value == 'tahunan') {
											$("#periode_hari").hide();
											$("#periode_bulan").hide();
											$("#periode_tahun").fadeIn("slow");
											$("#maks_transaksi").fadeIn("slow");
										} else if (this.value == 'bulanan') {
											$("#periode_tahun").hide();
											$("#periode_hari").hide();
											$("#periode_bulan").fadeIn("slow");
											$("#maks_transaksi").fadeIn("slow");
										} else if (this.value == 'harian') {
											$("#periode_tahun").hide();
											$("#periode_bulan").hide();
											$("#periode_hari").fadeIn("slow");
											$("#maks_transaksi").hide();
											$("#maks_transaksi_berulang").val(0);
										}
										//$("#periode_bulan").fadeIn("slow");
										//alert(this.value);
									});
								});
							</script>