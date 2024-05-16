    // var bus_data='<?php'+$bus_info+';?>';
    var did = [];
    var total_final_seat_count = $('#total_seat_count').val();

    did = $('#bdata').val();
    if(js_array.length != 0){
    var array_data = js_array;
   
    if(typeof booked_data != 'undefined'){
    var booked_seats_data=booked_data;
    }else{
    var booked_seats_data='';

    }

    if(typeof temp_booked_data != 'undefined'){
    var temp_booked_seats_data=temp_booked_data;
        }else{
        var temp_booked_seats_data='';
        }

        if(typeof temp_hold_data != 'undefined'){
            var temp_hold_seats_data=temp_hold_data;
            }else{
            var temp_hold_seats_data='';
            }

    var total_seat_count = array_data.total_seat_count;
    var new_first_string = array_data.first_cls_seats;
    var new_first_array = new_first_string.split(',');

    var new_second_string = array_data.second_cls_seats
    var new_second_array = new_second_string.split(',');

    var new_third_string = array_data.third_cls_seats
    var new_third_array = new_third_string.split(',');

    var new_fourth_string = array_data.fourth_cls_seats;
    var new_fourth_array = new_fourth_string.split(',');

    var admin_hold_string = array_data.admin_hold_seats;
    var admin_hold_array = admin_hold_string.split(',');
    
    console.log('admin_hold_arrayadmin_hold_arrayadmin_hold_array',admin_hold_array);

    var first_cls_cnt = new_first_array.length;
    var second_cls_cnt = new_second_array.length;
    var economy_cls_cnt = new_third_array.length;
    var fourth_cls_cnt = new_fourth_array.length;



    var total_seat_count = parseInt(first_cls_cnt) + parseInt(second_cls_cnt) + parseInt(economy_cls_cnt) + parseInt(fourth_cls_cnt);

    var first_cls_amt = parseInt(array_data.first_class_price);
    var first_cls_window_amt = first_cls_amt + parseInt(array_data.window_class_price);

    var second_cls_amt = parseInt(array_data.second_class_price);
    var second_cls_window_amt = second_cls_amt + parseInt(array_data.window_class_price);

    var economy_cls_amt = parseInt(array_data.third_class_price);
    var economy_cls_window_amt = economy_cls_amt + parseInt(array_data.window_class_price);

    var fourth_cls_amt = parseInt(array_data.fourth_class_price);
    var fourth_cls_window_amt = fourth_cls_amt + parseInt(array_data.window_class_price);

    var abc = [];
    for (var i = 0; i < total_seat_count; i++) {
        var new_i = parseInt(i)+1;
        var i_string = new_i.toString();
        if (($.inArray(i_string, new_first_array) != '-1' && $.inArray(i_string, booked_seats_data) != '-1')) {
            abc.splice(new_i, new_i, 'u');
        } else if (($.inArray(i_string, new_first_array) != '-1')) {
            abc.splice(new_i, new_i, 'f');
        } else {
            abc.splice(new_i, new_i, '');
        }
    }

    var xyz = [];
    for (var j = 1; j <= total_seat_count; j++) {
        var j_string = j.toString();

        if (($.inArray(j_string, new_second_array) != '-1')) {
            xyz.splice(j, j, 's');
        } else {
            xyz.splice(j, j, '');
        }
    }

    var pqr = [];
    for (var k = 1; k <= total_seat_count; k++) {
        var k_string = k.toString();

        if (($.inArray(k_string, new_third_array) != '-1')) {
            pqr.splice(k, k, 'e');
        } else {
            pqr.splice(k, k, '');
        }
    }

    var def = [];
for (var q = 1; q <= total_seat_count; q++) {
    var q_string = q.toString();

    if ($.inArray(q_string, new_fourth_array) != '-1') {
        def.splice(q, q, 'v');
    } else {
        def.splice(q, q, '');
    }
}

    var final=[];
for(var p=0; p<total_seat_count; p++) {
    add_p = parseInt(p) + parseInt(1);
    var p_string = add_p.toString();

    if($.inArray(p_string, new_first_array) != '-1') {
        final.push(abc[p]);
    }
    else if($.inArray(p_string, new_second_array) != '-1') {
        final.push(xyz[p]);
    }
    else if($.inArray(p_string, new_third_array) != '-1') {
        final.push(pqr[p]);
    }
    else if($.inArray(p_string, new_fourth_array) != '-1') {
        final.push(def[p]);
    }
}

    var final_filtered_a = final.filter(elm => elm);



    var myString = "";
    myString += 'a';
    for (var i = 0; i < final_filtered_a.length; i++) {

        if(final_filtered_a[i]=='f' || final_filtered_a[i]=='u')
        {
        var i_string = i.toString();
    
        if ($.inArray(i_string, new_first_array) != '-1') {
            myString += final_filtered_a[i];
            if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0) {
                myString += "_";
            }
            
            var ooo = final_filtered_a.length - 1;
            if ((i + 1) % 4 === 0) {
                myString = myString.substring(0, myString.length - 1);
                myString += "a,";
            } else if ((i + 1) % 4 === 1 && i != 0) {
                myString = myString.substring(0, myString.length - 1);
                myString += "a";
            }
        } else {
            myString += "";
        }
    } 
    }

    // =============================================================================================================================================================



    var myString_second = "b";

    for (var i = 0; i < final_filtered_a.length; i++) {
        if(final_filtered_a[i]=='s' || final_filtered_a[i]=='u')
        {
        // var add_i=parseInt(i)+parseInt(1);
        var i_string = i.toString();
        if ($.inArray(i_string, new_second_array) != '-1') {
            myString_second += final_filtered_a[i];
            if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0) {
                myString_second += "_";
            }
            var ooo = xyz.length - 1;
            if ((i + 1) % 4 === 0) {
                myString_second = myString_second.substring(0, myString_second.length - 1);
                myString_second += "b,";
            } else if ((i + 1) % 4 === 1 && i != 0) {
                myString_second = myString_second.substring(0, myString_second.length - 1);
                myString_second += "b";
            } else if (i == 0) {
                myString_second = myString_second.substring(0, myString_second.length - 1);
                myString_second += "b";
            }
        } else {
            myString_second += "";
        }
    }
    }

    // =============================================================================================================================================================


    var myString_economy = "c";
    for (var i = 0; i < final_filtered_a.length; i++) {
        if(final_filtered_a[i]=='e' || final_filtered_a[i]=='u')
        {
            var i_string = i.toString();
            if ($.inArray(i_string, new_third_array) != '-1') {
                myString_economy += final_filtered_a[i];

                var remain = final_filtered_a.length - i;

                if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0 && remain > 5) {
                    myString_economy += "_";
                }
                var ooo = final_filtered_a.length - 1;
                if ((i + 1) % 4 === 0 && remain > 2) {
                    myString_economy = myString_economy.substring(0, myString_economy.length - 1);
                    myString_economy += "c,";
                } else if ((i + 1) % 4 === 1 && i != 0) {
                    myString_economy = myString_economy.substring(0, myString_economy.length - 1);
                    myString_economy += "c";
                } else if (i == 0) {
                    myString_economy = myString_economy.substring(0, myString_economy.length - 1);
                    myString_economy += "c";
                }

            } else {
                myString_economy += "";
            }
        }
    }

    var myString_fourth = "d";
    for (var i = 0; i < final_filtered_a.length; i++) {
        if(final_filtered_a[i]=='v' || final_filtered_a[i]=='u')
        {
            var i_string = i.toString();
            if ($.inArray(i_string, new_fourth_array) != '-1') {
                var new_i= i + parseInt(1);
                if(new_i != final_filtered_a.length)
                {
                    myString_fourth += final_filtered_a[i];
                }else if(new_i == final_filtered_a.length)
                {
                    myString_fourth += "d"; 
                }      
            } else {
                myString_fourth += "";
            }
        }
    }


    // =============================================================================================================================================================

    // *****************************************************************************************************************************************************************

    // *****************************************************************************************************************************************************************
    var numbersArray = myString.split(',');
    var numbersArray_second = myString_second.split(',');
    var numbersArray_economy = myString_economy.split(',');
    var numbersArray_fourth = myString_fourth.split(',');

    var array_final = numbersArray.concat(numbersArray_second, numbersArray_economy, numbersArray_fourth);
    var final_filtered = array_final.filter(elm => elm);
    var firstSeatLabel = 1;
    var selection_array = [];
    var booked = !!localStorage.getItem('booked') ? $.parseJSON(localStorage.getItem('booked')) : [];
    var $cart = $('#selected-seats');
    $(document).ready(function() {
        var selection_array = temp_booked_data;
        var $cart = $('#selected-seats'),
            $counter = $('#counter'),
            $total = $('#total'),
            sc = $('#bus-seat-map').seatCharts({
                map: final_filtered,
                seats: {
                    f: {
                        price: first_cls_amt,
                        classes: 'first-class', //your custom CSS class
                        category: 'First Class',
                        attr_win: '',

                    },
                    s: {
                        price: second_cls_amt,
                        classes: 'second-class', //your custom CSS class
                        category: 'Second Class',
                        attr_win: '',
                    },
                    e: {
                        price: economy_cls_amt,
                        classes: 'economy-class', //your custom CSS class
                        category: 'Economy Class',
                        attr_win: '',
                    },
                    v: {
                        price: fourth_cls_amt,
                        classes: 'fourth-class', //your custom CSS class
                        category: 'Fourth Class',
                        attr_win: '',
                    },
                    a: {
                        price: first_cls_amt,
                        classes: 'window-first-class', //your custom CSS class
                        category: 'Window Class',
                        attr_win: array_data.window_class_price
                    },
                    b: {
                        price: second_cls_amt,
                        classes: 'window-second-class', //your custom CSS class
                        category: 'Window Class',
                        attr_win: array_data.window_class_price

                    },
                    c: {
                        price: economy_cls_amt,
                        classes: 'window-economy-class', //your custom CSS class
                        category: 'Window Class',
                        attr_win: array_data.window_class_price

                    },
                    d: {
                        price: fourth_cls_amt,
                        classes: 'window-fourth-class', //your custom CSS class
                        category: 'Window Class',
                        attr_win: array_data.window_class_price

                    },
                    u: {
                        price: '0',
                        classes: 'booked', //your custom CSS class
                        category: 'Booked Class',
                        attr_win: '',

                    },
                    h: {
                        price: '0',
                        classes: 'hold', //your custom CSS class
                        category: 'Hold Class',
                        attr_win: '',

                    },
                    z: {
                        price: '0',
                        classes: 'admin_hold', //your custom CSS class
                        category: 'Admin Hold Class',
                        attr_win: '',

                    }
                },
                naming: {
                    top: false,
                    getLabel: function(character, row, column) {
                       
                        return firstSeatLabel++;
                   
                    },
                },
                legend: {
                    node: $('#legend'),
                    items: [
                        ['f', 'available', 'First Class'],
                        ['s', 'available', 'Second Class'],
                        ['e', 'available', 'Economy Class'],
                        ['v', 'available', 'Fourth Class'],
                        ['u', 'unavailable', 'Already Booked'],
                        ['a', 'selected', 'Selected'],
                        ['h', 'hold', 'Hold Seats'],
                        ['z', 'admin_hold', 'Admin Hold Seats'],
                        ['b', 'available', 'Window Seats'],
                    ]
                },
                click: function() {
                    var selectedSeats = [];
                    var seatIndex = $(this).attr('id');

                    var click_id = this.settings.$node.attr('data_id');
                    var middle_seat_pre = total_seat_count - 3;
                    var middle_id = total_seat_count - 2;

                    //1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
                    selection_array.push(this.settings.id);

                    var middle_next_seat = parseInt(middle_id) + parseInt(1);
                    var last_row_first_id = parseInt(middle_seat_pre) - 1;
                    var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');

                    var middle_btn_id = $("[data_id=" + middle_id + "]").attr('id');
                    var last_row_first_idid = $("[data_id=" + last_row_first_id + "]").attr('id');
                    
                    if (click_id == middle_seat_pre) 
                    {
                        // var kgf='aaaaaaaaaaaaaaaaaaaaaaa';
                        // console.log('11111111111111111111111111111111111111111111111111111111111111111111',selection_array);
                        var middle_next_seat_string = $("[data_id=" + middle_next_seat + "]").attr('class');
                        var middle_next_seat_array = middle_next_seat_string.split(" ");
                        if (this.status() == 'available') 
                        {
                            if ($.inArray(middle_btn_id, selection_array) != '-1') 
                            {
                                // console.log('middle_if1');
                                
                                var last_row_first_cls = $("[data_id=" + last_row_first_id + "]").attr('class');
                                var last_row_first_cls_array = last_row_first_cls.split(" ");
                                if ($.inArray('available', last_row_first_cls_array) != '-1') 
                                {
                                    

                                    var amt_for_addition = recalculateTotal(sc,click_id,selection_array); 

                                    $("[data_id=" + middle_id + "]").click();
                                    $("[data_id=" + middle_id + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class available");
                                    sc.status(middle_btn_id, 'available');

                                    
                                    $("[data_id=" + last_row_first_id + "]").click();
                                    // $("[data_id=" + last_row_first_id + "]").attr('aria-checked', "true");
                                    // $("[data_id=" + last_row_first_id + "]").attr('class', "seatCharts-seat seatCharts-cell window-economy-class selected");
                                    sc.status(last_row_first_idid, 'selected');

                                    selection_array.splice($.inArray(middle_btn_id, selection_array), 1);
                                    // add_to_cart(last_row_first_id, middle_btn_id, last_row_first_idid, $cart);






                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                    $counter.text(sc.find('selected').length + 1);
                                    $total.text(amt_for_addition - this.data().price);

                                    if (total_final_seat_count == $('#selected-seats li').length) {
                                        $('#booknow_submit').attr("disabled", false);
                                    } else {
                                        $('#booknow_submit').attr("disabled", true);
                                    }

                                    return 'selected';
                                } else {
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                    $counter.text(sc.find('selected').length + 1);
                                    $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);

                                    if (total_final_seat_count == $('#selected-seats li').length) {
                                        $('#booknow_submit').attr("disabled", false);
                                    } else {
                                        $('#booknow_submit').attr("disabled", true);
                                    }

                                    return 'selected';
                                }

                            } else if ($.inArray(last_seat_id, selection_array) != '-1' && ($.inArray('available', middle_next_seat_array) != '-1')) 
                            {
                            // console.log('middle_if2');
                                var amt_for_addition = recalculateTotal(sc,click_id,selection_array); 
                                // console.log('last_seat_id',last_seat_id);
                                $('#cart-item-' + this.settings.id).remove();
                                sc.status(last_row_first_idid, 'available');
                                // $("[attr_win_remove=win_" + last_seat_id + "]").remove();
                                
                                var middle_next_id = $("[data_id=" + middle_next_seat + "]").attr('id');
                                var last_seat_string = $("[data_id=" + total_seat_count + "]").attr('class');
                                var last_seat_array = last_seat_string.split(" ");

                                $("[data_id=" + middle_next_seat + "]").click();
                                // sc.status(middle_next_id, 'selected');

                                // var middle_next_seat_type = $("[data_id=" + middle_next_seat + "]").attr('seat_type');
                                // var middle_next_seat_label = $("[data_id=" + middle_next_seat + "]").text();
                                var middle_next_seat_price = $("[data_id=" + last_row_first_id + "]").attr('seat_price');

                                // $('<li>' + middle_next_seat_type + ' Seat # ' + middle_next_seat_label + ': <b>Rs. -' + middle_next_seat_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                // .attr('id', 'cart-item-' + middle_next_id)
                                // .attr('class', 'cart-item-cls-' + middle_next_id)
                                // .data('seatId', middle_next_id)
                                // .appendTo($cart);

                                $counter.text(sc.find('selected').length + 1);

                                selection_array.splice($.inArray(this.settings.id, selection_array), 1);
                                selection_array.push(middle_next_id);

                                var final_amt = amt_for_addition + parseInt(-middle_next_seat_price);
                                
                                $total.text(parseInt(final_amt));


                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'available';

                                selection_array.splice($.inArray(last_row_first_idid, selection_array), 1);
                            } else {
                                // console.log('middle_if3');
                                


                                $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                    .attr('id', 'cart-item-' + this.settings.id)
                                    .attr('class', 'cart-item-cls-' + this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);

                                $counter.text(sc.find('selected').length + 1);
                                // $("[data_id=" + middle_seat_pre + "]").attr('class', "seatCharts-seat seatCharts-cell economy-class selected");

                                $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);





                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }

                                return 'selected';

                            }
                        } else if (this.status() == 'selected') {
                           
                           
                            $counter.text(sc.find('selected').length - 1);
                            //and total
                            $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);

                            //remove the item from our cart
                            $('#cart-item-' + this.settings.id).remove();
                            // selection_array.splice($.inArray(this.settings.id, selection_array), 1);

                            var valueToRemove = this.settings.id;

                            selection_array = jQuery.grep(selection_array, function(value) {
                                return value !== valueToRemove;
                            });

                            if (total_final_seat_count == $('#selected-seats li').length) {
                                $('#booknow_submit').attr("disabled", false);
                            } else {
                                $('#booknow_submit').attr("disabled", true);
                            }

                            //seat has been vacated
                            return 'available';

                        }

                    }
                    // //###########################################################################################################################################################################################################################################################################
                    // //add code for second last seat click
                    else if (click_id == middle_next_seat) 
                    {

                        if (this.status() == 'available') {
                            // console.log('fffffffffffff');

                            if ($.inArray(middle_btn_id, selection_array) != '-1') {
                                var last_seat_string = $("[data_id=" + total_seat_count + "]").attr('class');
                                var last_seat_array = last_seat_string.split(" ");

                                if ($.inArray('available', last_seat_array) != '-1') {
                                    // console.log('cccccccccccccc');

                                    var amt_for_addition = recalculateTotal(sc,click_id,selection_array); 

                                    $("[data_id=" + middle_id + "]").click();
                                    $("[data_id=" + middle_id + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class available");
                                    sc.status(middle_btn_id, 'available');


                                    $("[data_id=" + total_seat_count + "]").click();

                                    selection_array.splice($.inArray(middle_btn_id, selection_array), 1);

                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                    $counter.text(sc.find('selected').length + 1);
                                    $total.text(amt_for_addition - this.data().price);

                                    if (total_final_seat_count == $('#selected-seats li').length) {
                                        $('#booknow_submit').attr("disabled", false);
                                    } else {
                                        $('#booknow_submit').attr("disabled", true);
                                    }

                                    return 'selected';
                                } else if ($.inArray('selected', last_seat_array) != '-1'){
                                // console.log('dddddddddddddd');

                                var amt_for_addition = recalculateTotal(sc,click_id,selection_array);
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                    $counter.text(sc.find('selected').length + 1);
                                    $total.text(amt_for_addition - this.data().price);

                                    if (total_final_seat_count == $('#selected-seats li').length) {
                                        $('#booknow_submit').attr("disabled", false);
                                    } else {
                                        $('#booknow_submit').attr("disabled", true);
                                    }
                                    return 'selected';
                                }
                            } else {
                                // console.log('vvvvvvvvvvvvvvvvvv');
                                $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                    .attr('id', 'cart-item-' + this.settings.id)
                                    .attr('class', 'cart-item-cls-' + this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);

                                $counter.text(sc.find('selected').length + 1);
                                $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);

                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'selected';

                            }

                        } else if (this.status() == 'selected') {
                            //update the counter
                            $counter.text(sc.find('selected').length - 1);

                            //and total
                            $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                            // console.log('llllllllllllllllllllllllllllllll',selection_array);
                            // console.log('zzzzzzxxxxxxzxxxxxxxxxxxxxx',this.settings.id);
                            //remove the item from our cart
                            $('#cart-item-' + this.settings.id).remove();
                            // selection_array.splice($.inArray(this.settings.id, selection_array), 1);
                            var valueToRemove = this.settings.id;

                            selection_array = jQuery.grep(selection_array, function(value) {
                                return value !== valueToRemove;
                            });
                            
                        // console.log('ffffffffffffffffffffffffffffffff',selection_array);
                            if (total_final_seat_count == $('#selected-seats li').length) {
                                $('#booknow_submit').attr("disabled", false);
                            } else {
                                $('#booknow_submit').attr("disabled", true);
                            }

                            //seat has been vacated
                            return 'available';

                        }
                    } 
                    //last_row_first_id*********************************************************************************************************************************************************
                    else if (click_id == last_row_first_id) 
                    {
                        if (this.status() == 'available') {
                            var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');
                            var middle_next_id = $("[data_id=" + middle_next_seat + "]").attr('id');

                            var middle_next_seat_string = $("[data_id=" + middle_next_seat + "]").attr('class');
                            var middle_next_seat_array = middle_next_seat_string.split(" ");
                            
                            if ($.inArray(last_seat_id, selection_array) != '-1' && ($.inArray('available', middle_next_seat_array) != '-1')) 
                            {
                                var amt_for_addition = recalculateTotal(sc,click_id,selection_array);

                                var last_seat_string = $("[data_id=" + total_seat_count + "]").attr('class');
                                var last_seat_array = last_seat_string.split(" ");

                                // $("[data_id=" + last_row_first_id + "]").click();
                                $("[data_id=" + last_row_first_id + "]").attr('class', "seatCharts-seat seatCharts-cell window-fourth-class available");
                                $("[data_id=" + middle_next_seat + "]").attr('aria-checked', "true");

                                $("[data_id=" + middle_next_seat + "]").click();
                                // $("[data_id=" + middle_next_seat + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class selected");
                                // sc.status(middle_next_id, 'selected');

                                // var middle_next_seat_type = $("[data_id=" + middle_next_seat + "]").attr('seat_type');
                                // var middle_next_seat_label = $("[data_id=" + middle_next_seat + "]").text();


                                selection_array.splice($.inArray(last_row_first_id, selection_array), 1);





                                // if (middle_next_seat_type == 'economy-class') {
                                //     var middle_next_seat_price = economy_cls_amt;
                                // } else if (middle_next_seat_type == 'window-economy-class') {
                                //     var middle_next_seat_price = economy_cls_window_amt;
                                // } else if (middle_next_seat_type == 'second-class') {
                                //     var middle_next_seat_price = second_cls_amt;
                                // } else if (middle_next_seat_type == 'window-second-class') {
                                //     var middle_next_seat_price = second_cls_window_amt;
                                // } else if (middle_next_seat_type == 'first-class') {
                                //     var middle_next_seat_price = first_cls_amt;
                                // } else if (middle_next_seat_type == 'window-first-class') {
                                //     var middle_next_seat_price = first_cls_window_amt;
                                // }


                                // $('<li>' + middle_next_seat_type + ' Seat # ' + middle_next_seat_label + ': <b>Rs. ' + middle_next_seat_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //     .attr('id', 'cart-item-' + middle_next_id)
                                //     .attr('class', 'cart-item-cls-' + middle_next_id)
                                //     .data('seatId', middle_next_id)
                                //     .appendTo($cart);
                                // $('#cart-item-' + last_row_first_idid).remove();

                                $counter.text(sc.find('selected').length + 1);
                                // var amt_for_addition = recalculateTotal(sc);
                                // var final_amt = amt_for_addition + middle_next_seat_price
                                // $total.text(final_amt + middle_next_seat_price);

                                sc.status(last_row_first_idid, 'available');

                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'available';

                                selection_array.splice($.inArray(last_row_first_idid, selection_array), 1);
                            } else {
                                
                                var middle_seat_pre_string = $("[data_id=" + middle_seat_pre + "]").attr('class');
                                var middle_seat_pre_array = middle_seat_pre_string.split(" ");
                              
                                if (($.inArray('available', middle_seat_pre_array) != '-1')) {
                                    // console.log('bbbbbbbbbbbbbbbbbbbbbbbbbbbbb');
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                    + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
    
                                    $counter.text(sc.find('selected').length + 1);
    
                                    


                                    var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) - this.data().price;
                                    $total.text(parseInt(array_data.window_class_price)+parseInt(seat_cost_with_window));
                                }else{
                                    // console.log('kkkkkkkkkkkkkkkkkkkkkkkkkkkkk');

                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
    
                                    $counter.text(sc.find('selected').length + 1);

                                       
                                        var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) - this.data().price;
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                                       
                                }

                                // $total.text(recalculateTotal(sc) - this.data().price);

                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'selected';

                            }
                        } else if (this.status() == 'selected') {

                            //update the counter
                            $counter.text(sc.find('selected').length - 1);

                            var middle_seat_pre_string = $("[data_id=" + middle_seat_pre + "]").attr('class');
                            var middle_seat_pre_array = middle_seat_pre_string.split(" ");

                            if (($.inArray('available', middle_seat_pre_array) != '-1')) {
                                var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) + this.data().price;
                                console.log('lllllllllllllllllllllllllllllll',seat_cost_with_window);

                                $total.text(parseInt(array_data.window_class_price)-parseInt(seat_cost_with_window));
                            }
                            if (($.inArray('admin_hold', middle_seat_pre_array) != '-1')) {
                                var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) + this.data().price;
                                console.log('lllllllllllllllllllllllllllllll',seat_cost_with_window);

                                $total.text(parseInt(array_data.window_class_price)-parseInt(seat_cost_with_window));
                            }
                            else{
                                // console.log('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
                                
                                    // $seat_cost_with_window= recalculateTotal(sc) - this.data().price;
                                    $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price); 
                            }
                          
                            

                            //remove the item from our cart
                            $('#cart-item-' + this.settings.id).remove();
                            selection_array.splice($.inArray(this.settings.id, selection_array), 1);

                            if (total_final_seat_count == $('#selected-seats li').length) {
                                $('#booknow_submit').attr("disabled", false);
                            } else {
                                $('#booknow_submit').attr("disabled", true);
                            }

                            //seat has been vacated
                            return 'available';

                        }

                        //###########################################################################################################################################################################################################################################################################
                    } 
                    else if (click_id == total_seat_count) {
                            // console.log('eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee');
                        if (this.status() == 'available') {
                            var last_row_first_main_id = $("[data_id=" + last_row_first_id + "]").attr('id');
                            var middle_pre_id = $("[data_id=" + middle_seat_pre + "]").attr('id');

                            var middle_seat_pre_string = $("[data_id=" + middle_seat_pre + "]").attr('class');
                            var middle_seat_pre_array = middle_seat_pre_string.split(" ");

                            var middle_next_seat_string = $("[data_id=" + middle_next_seat + "]").attr('class');
                            var middle_next_seat_array = middle_next_seat_string.split(" ");

                            if ($.inArray(last_row_first_main_id, selection_array) != '-1' && ($.inArray('available', middle_seat_pre_array) != '-1'))
                            {

                                // var amt_for_addition = recalculateTotal(sc,click_id,selection_array);

                                var last_row_first_string = $("[data_id=" + last_row_first_id + "]").attr('class');
                                var last_row_first_array = last_row_first_string.split(" ");


                                $("[data_id=" + last_seat_id + "]").attr('class', "seatCharts-seat seatCharts-cell window-fourth-class available");
                                $("[data_id=" + middle_seat_pre + "]").attr('aria-checked', "true");
                                selection_array.splice($.inArray(last_seat_id, selection_array), 1);


                                $("[data_id=" + middle_seat_pre + "]").click();


                                

                                $counter.text(sc.find('selected').length + 1);




                                // var last_row_first_string = $("[data_id=" + last_row_first_id + "]").attr('class');
                                // var last_row_first_array = last_row_first_string.split(" ");

                                // $("[data_id=" + last_seat_id + "]").attr('class', "seatCharts-seat seatCharts-cell economy-class available");
                                // $("[data_id=" + middle_seat_pre + "]").attr('aria-checked', "true");
                                // $("[data_id=" + middle_seat_pre + "]").attr('class', "seatCharts-seat seatCharts-cell economy-class selected");
                                // sc.status(middle_pre_id, 'selected');

                                // var middle_seat_pre_type = $("[data_id=" + middle_seat_pre + "]").attr('seat_type');
                                // var middle_seat_pre_label = $("[data_id=" + middle_seat_pre + "]").text();

                                // if (middle_seat_pre_type == 'economy-class') {
                                //     var middle_seat_pre_price = economy_cls_amt;
                                // } else if (middle_seat_pre_type == 'window-economy-class') {
                                //     var middle_seat_pre_price = economy_cls_window_amt;
                                // } else if (middle_seat_pre_type == 'second-class') {
                                //     var middle_seat_pre_price = second_cls_amt;
                                // } else if (middle_seat_pre_type == 'window-second-class') {
                                //     var middle_seat_pre_price = second_cls_window_amt;
                                // } else if (middle_seat_pre_type == 'first-class') {
                                //     var middle_seat_pre_price = first_cls_amt;
                                // } else if (middle_seat_pre_type == 'window-first-class') {
                                //     var middle_seat_pre_price = first_cls_window_amt;
                                // }


                                // $('<li>' + middle_seat_pre_type + ' Seat # ' + middle_seat_pre_label + ': <b>Rs. ' + middle_seat_pre_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //     .attr('id', 'cart-item-' + middle_pre_id)
                                //     .attr('class', 'cart-item-cls-' + middle_pre_id)
                                //     .data('seatId', middle_pre_id)
                                //     .appendTo($cart);
                                // $('#cart-item-' + last_seat_id).remove();

                                // $counter.text(sc.find('selected').length + 1);
                                // $total.text(recalculateTotal(sc));
                                sc.status(last_seat_id, 'available');
                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'available';

                                selection_array.splice($.inArray(last_row_first_idid, selection_array), 1);
                            } else {

                                if(($.inArray('available', middle_next_seat_array) != '-1'))
                                {
                                    // console.log('last seat click 1');
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                    + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                        selection_array.push(this.settings.id);
                                    $counter.text(sc.find('selected').length + 1);

                                    var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) - this.data().price;
                                    $total.text(parseInt(array_data.window_class_price)+parseInt(seat_cost_with_window));
                                }
                                else
                                {
                                    // console.log('last seat click 2');
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                        selection_array.push(this.settings.id);
                                    $counter.text(sc.find('selected').length + 1);

                                    // var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) - this.data().price;
                                    $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                                }    


                                // $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'selected';
                            }
                        } else if (this.status() == 'selected') {

                            //update the counter
                            $counter.text(sc.find('selected').length - 1);

                            //and total
                            // $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);

                            // var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) - this.data().price;
                            // $total.text(parseInt(array_data.window_class_price)-parseInt(seat_cost_with_window));

                            // var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) + this.data().price;
                            // console.log('ssssssssssssssssssssssssssssssssssssssssssssssssssss',seat_cost_with_window);
                            //         $total.text(parseInt(array_data.window_class_price)-parseInt(seat_cost_with_window));




                            if (($.inArray('available', middle_next_seat_array) != '-1')) {
                                var seat_cost_with_window= recalculateTotal(sc,click_id,selection_array) + this.data().price;
                                // console.log('lllllllllllllllllllllllllllllll',seat_cost_with_window);

                                $total.text(parseInt(array_data.window_class_price)-parseInt(seat_cost_with_window));
                            }else{
                                // console.log('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

                                    // $seat_cost_with_window= recalculateTotal(sc) - this.data().price;

                                    $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);

                            }
                           
                            //remove the item from our cart
                            $('#cart-item-' + this.settings.id).remove();
                            var p = this.settings.id;
                            selection_array = $.grep(selection_array, function(element) {
                                return element !== p;
                            });

                            if (total_final_seat_count == $('#selected-seats li').length) {
                                $('#booknow_submit').attr("disabled", false);
                            } else {
                                $('#booknow_submit').attr("disabled", true);
                            }

                            //seat has been vacated
                            return 'available';

                        }

                        //###########################################################################################################################################################################################################################################################################
                    } 
                    else if (click_id == middle_id) {
                        if (this.status() == 'available') {
                            // console.log('--------------------------------------',selection_array);
                            
                            var middle_next_id = $("[data_id=" + middle_next_seat + "]").attr('id');
                            var middle_pre_id = $("[data_id=" + middle_seat_pre + "]").attr('id');
                            var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');
                            var last_row_first_seat_id = $("[data_id=" + last_row_first_id + "]").attr('id');
                            var middle_btn_id = $("[data_id=" + middle_id + "]").attr('id');


                            var last_seat_string = $("[data_id=" + total_seat_count + "]").attr('class');
                            var last_seat_array = last_seat_string.split(" ");

                            var last_row_first_string = $("[data_id=" + last_row_first_id + "]").attr('class');
                            var last_row_first_array = last_row_first_string.split(" ");

                            if ($.inArray(middle_next_id, selection_array) != '-1' && ($.inArray('available', last_seat_array) != '-1')) 
                            {

                                var amt_for_addition = recalculateTotal(sc,click_id,selection_array);

                                var middle_seat_string = $("[data_id=" + middle_id + "]").attr('class');
                                var middle_seat_array = middle_seat_string.split(" ");

                                $("[data_id=" + middle_id + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class available");
                                $("[data_id=" + total_seat_count + "]").attr('aria-checked', "true");

                                $("[data_id=" + total_seat_count + "]").click();
                                // $("[data_id=" + total_seat_count + "]").attr('class', "seatCharts-seat seatCharts-cell window-fourth-class selected");
                                // sc.status(last_seat_id, 'selected');

                                
                                selection_array.splice($.inArray(middle_btn_id, selection_array), 1);
                                selection_array.push(last_seat_id);

                                // var last_seat_type = $("[data_id=" + total_seat_count + "]").attr('seat_type');
                                // var last_seat_label = $("[data_id=" + total_seat_count + "]").text();
                                // var last_seat_price = $("[data_id=" + total_seat_count + "]").attr('seat_price');

                                // if (last_seat_type == 'economy-class') {
                                //     var laste_seat_price = economy_cls_amt;
                                // } else if (last_seat_type == 'window-economy-class') {
                                //     var laste_seat_price = economy_cls_window_amt;
                                // } else if (last_seat_type == 'second-class') {
                                //     var laste_seat_price = second_cls_amt;
                                // } else if (last_seat_type == 'window-second-class') {
                                //     var laste_seat_price = second_cls_window_amt;
                                // } else if (last_seat_type == 'first-class') {
                                //     var laste_seat_price = first_cls_amt;
                                // } else if (last_seat_type == 'window-first-class') {
                                //     var laste_seat_price = first_cls_window_amt;
                                // }


                                // $('<li>' + last_seat_type + ' Seat # ' + last_seat_label + ': <b>Rs. ' + last_seat_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //     .attr('id', 'cart-item-' + last_seat_id)
                                //     .attr('class', 'cart-item-cls-' + last_seat_id)
                                //     .data('seatId', last_seat_id)
                                //     .appendTo($cart);
                                $('#cart-item-' + middle_btn_id).remove();


                                $counter.text(sc.find('selected').length + 1);
                                
                                var final_amt = amt_for_addition - this.data().price;
                                $total.text(final_amt);

                                sc.status(middle_btn_id, 'available');
                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'available';

                                selection_array.splice($.inArray(last_row_first_idid, selection_array), 1);

                            } else if ($.inArray(middle_pre_id, selection_array) != '-1' && ($.inArray('available', last_row_first_array) != '-1')) 
                            {
                                var amt_for_addition = recalculateTotal(sc,click_id,selection_array);

                                var middle_seat_string = $("[data_id=" + middle_id + "]").attr('class');
                                var middle_seat_array = middle_seat_string.split(" ");

                                $("[data_id=" + middle_id + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class available");
                                $("[data_id=" + last_row_first_id + "]").attr('aria-checked', "true");

                                $("[data_id=" + last_row_first_id + "]").click();
                                // $("[data_id=" + last_row_first_id + "]").attr('class', "seatCharts-seat seatCharts-cell economy-class selected");
                                // sc.status(last_row_first_seat_id, 'selected');

                                // var last_row_first_seat_type = $("[data_id=" + last_row_first_id + "]").attr('seat_type');
                                // var last_row_first_label = $("[data_id=" + last_row_first_id + "]").text();

                                // if (last_row_first_seat_type == 'economy-class') {
                                //     var last_row_first_seat_price = economy_cls_amt;
                                // } else if (last_row_first_seat_type == 'window-economy-class') {
                                //     var last_row_first_seat_price = economy_cls_window_amt;
                                // } else if (last_row_first_seat_type == 'second-class') {
                                //     var last_row_first_seat_price = second_cls_amt;
                                // } else if (last_row_first_seat_type == 'window-second-class') {
                                //     var last_row_first_seat_price = second_cls_window_amt;
                                // } else if (last_row_first_seat_type == 'first-class') {
                                //     var last_row_first_seat_price = first_cls_amt;
                                // } else if (last_row_first_seat_type == 'window-first-class') {
                                //     var last_row_first_seat_price = first_cls_window_amt;
                                // }


                                // $('<li>' + last_row_first_seat_type + ' Seat # ' + last_row_first_label + ': <b>Rs. ' + last_row_first_seat_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //     .attr('id', 'cart-item-' + last_row_first_seat_id)
                                //     .attr('class', 'cart-item-cls-' + last_row_first_seat_id)
                                //     .data('seatId', last_row_first_seat_id)
                                //     .appendTo($cart);

                                selection_array.splice($.inArray(middle_btn_id, selection_array), 1);
                                selection_array.push(last_seat_id);

                                $('#cart-item-' + middle_btn_id).remove();

                                $counter.text(sc.find('selected').length + 1);
                                // var amt_for_addition = recalculateTotal(sc);
                                var final_amt = amt_for_addition - this.data().price;
                                $total.text(final_amt);

                                sc.status(middle_btn_id, 'available');
                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }
                                return 'available';

                                selection_array.splice($.inArray(last_row_first_idid, selection_array), 1);

                            } else {
                                $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                    .attr('id', 'cart-item-' + this.settings.id)
                                    .attr('class', 'cart-item-cls-' + this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);

                                $counter.text(sc.find('selected').length + 1);
                                $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);

                                if (total_final_seat_count == $('#selected-seats li').length) {
                                    $('#booknow_submit').attr("disabled", false);
                                } else {
                                    $('#booknow_submit').attr("disabled", true);
                                }

                                return 'selected';
                                //  ********************************************************************************************************************************************************************************               

                            }
                        } else if (this.status() == 'selected') {

                            //update the counter
                            $counter.text(sc.find('selected').length - 1);

                            //and total
                            $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);

                            //remove the item from our cart
                            $('#cart-item-' + this.settings.id).remove();
                            selection_array.splice($.inArray(this.settings.id, selection_array), 1);

                            if (total_final_seat_count == $('#selected-seats li').length) {
                                $('#booknow_submit').attr("disabled", false);
                            } else {
                                $('#booknow_submit').attr("disabled", true);
                            }

                            //seat has been vacated
                            return 'available';

                        }
                    } else 
                    if (this.status() == 'available') 
                    {

                        var seat_type = $("[data_id=" + click_id + "]").attr('seat_type');
                        var check_str='window';
                        var check_str_window_economy='window-economy-class';
                        var check_str_economy='economy-class';
                        var check_str_window_fourth='window-fourth-class';
                        var check_str_fourth='fourth-class';
                        var check_admin_hold="admin_hold";
                       
                        // हा कोड सीट सिलेक्ट करताना विंडो सीट आहे का हे चेक क्रय साठी वापरला आहे =================================================================================================
                        if(seat_type.indexOf(check_str)!=-1)
                        { 
                            //हा कोड सिलेक्ट केलेलं विंडो सीट हे १ नंबरच सीट आहे का हे चेक करण्या साठी वापरलं आहे. ================================================================================
                            if(click_id==1)
                            {
                                var clicked_next=parseInt(click_id)+1;
                                var clicked_next_main_id = $("[data_id=" + clicked_next + "]").attr('id');
                                var clicked_next_cls = $("[data_id=" + clicked_next + "]").attr('class');
                                var clicked_next_cls_array = clicked_next_cls.split(" ");
                                // हा कोड सिलेक्ट केलेल्या विंडो सीटच्या पुढचं सीट हे उपलब्ध आहे का हे चेक करण्या साठी वापरला आहे ================================================================================
                                if($.inArray('available', clicked_next_cls_array) != '-1')
                                { 
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                    + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);  
                                        var with_win_cost=parseInt(this.data().price)+parseInt(this.data().attr_win)
                                    $total.text(recalculateTotal(sc,click_id,selection_array) + parseInt(with_win_cost));
                                }
                                // हा कोड सिलेक्ट केलेल्या विंडो सीटच्या पुढचं सीट हे उपलब्ध नाही का हे चेक करण्या साठी वापरला आहे ================================================================================
                                else if($.inArray('selected', clicked_next_cls_array) != '-1')
                                {
                                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                    $total.text(recalculateTotal(sc) + this.data().price);
                                }
                            //हा कोड सिलेक्ट केलेलं विंडो सीट हे १ नंबरच सीट नाही का हे चेक करण्या साठी वापरलं आहे
                            }else if(click_id!=1)
                            {
                                var clicked_prev=click_id-1;
                                var clicked_next=parseInt(click_id)+1;

                                var clicked_prev_cls = $("[data_id=" + clicked_prev + "]").attr('class');
                                var clicked_prev_cls_array = clicked_prev_cls.split(" ");

                                var clicked_next_main_id = $("[data_id=" + clicked_next + "]").attr('id');

                                var clicked_cls = $("[data_id=" + click_id + "]").attr('class');
                                var clicked_cls_array = clicked_cls.split(" ");

                                if(total_seat_count != click_id){
                                var clicked_next_cls = $("[data_id=" + clicked_next + "]").attr('class');
                                var clicked_next_cls_array = clicked_next_cls.split(" ");

                                var next_seat_type = $("[data_id=" + clicked_next + "]").attr('seat_type');
                                }   
                                
                                var prev_seat_type = $("[data_id=" + clicked_prev + "]").attr('seat_type');

                                if(seat_type.indexOf(check_str_window_economy)==-1 && seat_type.indexOf(check_str_window_fourth)==-1)
                                {
                                        //हा कोड चेक करतो कि सिलेक्ट केलेलं विंडो सीटच्या मगच सीट हे उपलब्ध आज आणि ते मगच सीट हे विंडो सीट नाही 
                                    if($.inArray('available', clicked_prev_cls_array) != '-1' && prev_seat_type.indexOf(check_str)==-1)
                                    {  
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + win_additional_cost);
                                    }
                                        //हा कोड चेक करतो कि सिलेक्ट केलेलं विंडो सीटच्या मगच सीट हे उपलब्ध नाही आणि ते मगच सीट हे विंडो सीट नाही 
                                    else if($.inArray('selected', clicked_prev_cls_array) != '-1' && prev_seat_type.indexOf(check_str)==-1)
                                    {           
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);

                                        $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                                    } else if($.inArray('admin_hold', clicked_prev_cls_array) != '-1' && prev_seat_type.indexOf(check_str)==-1)
                                    {  
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + win_additional_cost);
                                    }
                                        //हा कोड चेक करतो कि सिलेक्ट केलेलं विंडो सीटच्या पुढचं सीट हे विंडो सीट नाही आणि ये उपलब्ध आहे  पण मगच सीट हे विंडो सीट आहे  
                                    else if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                            && $.inArray('available', clicked_next_cls_array) != '-1')
                                    {                
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + win_additional_cost);
                                    }
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 &&  clicked_next_cls.indexOf(check_str)!=-1
                                            && clicked_cls.indexOf(check_str)!=-1 && $.inArray('available', clicked_prev_cls_array) != '-1')
                                    {                
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + win_additional_cost);
                                    }else if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                            && clicked_cls.indexOf(check_str)!=-1 && $.inArray('available', clicked_next_cls_array) != '-1')
                                    {                
                                        //12l12l12l1l212l212l2l21
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + win_additional_cost);
                                    }else if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                    && clicked_cls.indexOf(check_str)!=-1 && $.inArray('selected', clicked_next_cls_array) != '-1')
                                    {                
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        // var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                                    }

                                    else if(clicked_prev_cls.indexOf(check_str)!=-1 && clicked_next_cls.indexOf(check_str)==-1 
                                            && $.inArray('admin_hold', clicked_next_cls_array) != '-1')
                                    {           
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var win_additional_cost= parseInt(this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + win_additional_cost);
                                    }

                                    
                                }else if(seat_type.indexOf(check_str_window_economy)!=-1 && seat_type.indexOf(check_str_window_fourth)==-1)
                                {
                                    if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                            && $.inArray('available', clicked_next_cls_array) != '-1')
                                    {    
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var economy_cls_reduced_amt= parseInt(-this.data().price)+parseInt(this.data().attr_win);
                                        // var economy_cls_reduced_amt= parseInt(win_additional_cost)- parseInt(this.data().price);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + economy_cls_reduced_amt);
                                    }else if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                            && $.inArray('selected', clicked_next_cls_array) != '-1')
                                    {    
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(this.data().price));
                                    }
                                    if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                            && $.inArray('admin_hold', clicked_next_cls_array) != '-1')
                                    {    
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var economy_cls_reduced_amt= parseInt(-this.data().price)+parseInt(this.data().attr_win);
                                        // var economy_cls_reduced_amt= parseInt(win_additional_cost)- parseInt(this.data().price);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + economy_cls_reduced_amt);
                                    }else if(clicked_prev_cls.indexOf(check_str)==-1 &&  clicked_next_cls.indexOf(check_str)!=-1
                                            && $.inArray('available', clicked_prev_cls_array) != '-1')
                                    {    
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var economy_cls_reduced_amt= parseInt(-this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + economy_cls_reduced_amt);
                                     }else if(clicked_prev_cls.indexOf(check_str)==-1 &&  clicked_next_cls.indexOf(check_str)!=-1
                                     && $.inArray('selected', clicked_prev_cls_array) != '-1')
                                    {    
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(this.data().price));
                                    }
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 &&  clicked_next_cls.indexOf(check_str)!=-1
                                            && $.inArray('admin_hold', clicked_prev_cls_array) != '-1')
                                    {    
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                
                                        var economy_cls_reduced_amt= parseInt(-this.data().price)+parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + economy_cls_reduced_amt);
                                     }

                                }
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
// AAAAAAAAAAAAAVVVVVVVVVVVVVVVVVVAAAAAAAAAAAAAAAAAAAAIIIIIIIIIIIIIIIIILLLLLLLLLLAAAAAAAAAABBBBBBBBBBLLLLLLLLLLLEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE                       
                                
                                // else if(seat_type.indexOf(check_str_window_fourth)!=-1 && seat_type.indexOf(check_str_window_economy)==-1)
                                // {
                                //     var middle_pre_id = $("[data_id=" + middle_seat_pre + "]").attr('id');
                                //     var last_row_first_main_id = $("[data_id=" + last_row_first_id + "]").attr('id');
                                //     var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');
                                //     var middle_next_id = $("[data_id=" + middle_next_seat + "]").attr('id');

                                //     var middle_next_seat_string = $("[data_id=" + middle_next_seat + "]").attr('class');
                                //     var middle_next_seat_array = middle_next_seat_string.split(" ");

                                //     var middle_seat_pre_string = $("[data_id=" + middle_seat_pre + "]").attr('class');
                                //     var middle_seat_pre_array = middle_seat_pre_string.split(" ");

                                //     if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                //             && $.inArray('available', clicked_next_cls_array) != '-1' && $.inArray(last_seat_id, selection_array) == '-1')
                                //     { 
                                //         $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                //         + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                //         .attr('id', 'cart-item-' + this.settings.id)
                                //         .attr('class', 'cart-item-cls-' + this.settings.id)
                                //         .data('seatId', this.settings.id)
                                //         .appendTo($cart);
                                //         $counter.text(sc.find('selected').length + 1);
                                //         var economy_cls_reduced_amt= parseInt(-this.data().price)+parseInt(this.data().attr_win);
                                //         $total.text(recalculateTotal(sc,click_id,selection_array) + economy_cls_reduced_amt);
                                //     }
                                //     else if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                //             && $.inArray('selected', clicked_next_cls_array) != '-1' && $.inArray(last_seat_id, selection_array) == '-1')
                                //     { 
                                //         $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //         .attr('id', 'cart-item-' + this.settings.id)
                                //         .attr('class', 'cart-item-cls-' + this.settings.id)
                                //         .data('seatId', this.settings.id)
                                //         .appendTo($cart);
                                //         $counter.text(sc.find('selected').length + 1);
                                //         $total.text(recalculateTotal(sc,click_id,selection_array) + parseInt(-this.data().price));
                                //     }
                                //     else  if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1
                                //                 && $.inArray('available', clicked_next_cls_array) != '-1' && $.inArray(last_seat_id, selection_array) != '-1'
                                //                 && ($.inArray('available', middle_next_seat_array) != '-1'))
                                //     {

                                //         var amt_for_addition = recalculateTotal(sc,click_id,selection_array);

                                //             $("[data_id=" + last_row_first_id + "]").attr('class', "seatCharts-seat seatCharts-cell window-fourth-class available");
                                //             $("[data_id=" + middle_next_seat + "]").attr('aria-checked', "true");
                                //             $("[data_id=" + middle_next_seat + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class selected");
                                //             sc.status(middle_next_id, 'selected');

                                //             var middle_next_seat_type = $("[data_id=" + middle_next_seat + "]").attr('seat_type');
                                //             var middle_next_seat_label = $("[data_id=" + middle_next_seat + "]").text();
                                //             var middle_next_seat_price = $("[data_id=" + middle_next_seat + "]").attr('seat_price');

                                //             $('<li>' + middle_next_seat_type + ' Seat # ' + middle_next_seat_label + ': <b>Rs. -' + middle_next_seat_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //             .attr('id', 'cart-item-' + middle_next_id)
                                //             .attr('class', 'cart-item-cls-' + middle_next_id)
                                //             .data('seatId', middle_next_id)
                                //             .appendTo($cart);
                                //             $('#cart-item-' + last_row_first_idid).remove();

                                //             $counter.text(sc.find('selected').length + 1);
                                            
                                //             var final_amt = amt_for_addition + parseInt(-middle_next_seat_price)

                                //             $total.text(parseInt(final_amt));

                                //             sc.status(last_row_first_idid, 'available');

                                //             if (total_final_seat_count == $('#selected-seats li').length) {
                                //                 $('#booknow_submit').attr("disabled", false);
                                //             } else {
                                //                 $('#booknow_submit').attr("disabled", true);
                                //             }
                                //             return 'available';

                                //             selection_array.splice($.inArray(last_row_first_idid, selection_array), 1);
                                //     }else if(clicked_prev_cls.indexOf(check_str)==-1 && click_id==total_seat_count && $.inArray(last_row_first_main_id, selection_array) == '-1' 
                                //                 && $.inArray('available', clicked_prev_cls_array) != '-1')
                                //     { 
                                //         $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li><li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                //         + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                //         .attr('id', 'cart-item-' + this.settings.id)
                                //         .attr('class', 'cart-item-cls-' + this.settings.id)
                                //         .data('seatId', this.settings.id)
                                //         .appendTo($cart);
                                //         $counter.text(sc.find('selected').length + 1);
                                
                                //         var economy_cls_reduced_amt= parseInt(-this.data().price)+parseInt(this.data().attr_win);
                                //         $total.text(recalculateTotal(sc,click_id,selection_array) + economy_cls_reduced_amt);
                                //     }else if(clicked_prev_cls.indexOf(check_str)==-1 && click_id==total_seat_count && $.inArray(last_row_first_main_id, selection_array) == '-1' 
                                //                 && $.inArray('selected', clicked_prev_cls_array) != '-1')
                                //     { 
                                //         $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //         .attr('id', 'cart-item-' + this.settings.id)
                                //         .attr('class', 'cart-item-cls-' + this.settings.id)
                                //         .data('seatId', this.settings.id)
                                //         .appendTo($cart);
                                //         $counter.text(sc.find('selected').length + 1);
                                //         $total.text(recalculateTotal(sc,click_id,selection_array) + parseInt(-this.data().price));
                                //     }else  if(clicked_prev_cls.indexOf(check_str)==-1 && click_id==total_seat_count
                                //                 && $.inArray('available', clicked_prev_cls_array) != '-1' && $.inArray(last_row_first_main_id, selection_array) != '-1'
                                //                 && ($.inArray('available', middle_seat_pre_array) != '-1'))
                                //     {
                                //         var amt_for_addition = recalculateTotal(sc,click_id,selection_array);

                                //         $("[data_id=" + last_seat_id + "]").attr('class', "seatCharts-seat seatCharts-cell window-fourth-class available");
                                //         $("[data_id=" + middle_seat_pre + "]").attr('aria-checked', "true");
                                //         $("[data_id=" + middle_seat_pre + "]").attr('class', "seatCharts-seat seatCharts-cell fourth-class selected");
                                //         sc.status(middle_pre_id, 'selected');
                                        
                                //         var middle_seat_pre_type = $("[data_id=" + middle_seat_pre + "]").attr('seat_type');
                                //         var middle_seat_pre_label = $("[data_id=" + middle_seat_pre + "]").text();
                                //         var middle_seat_pre_price = $("[data_id=" + middle_seat_pre + "]").attr('seat_price');

                                //         $('<li>' + middle_seat_pre_type + ' Seat # ' + middle_seat_pre_label + ': <b>Rs. ' + middle_seat_pre_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                //         .attr('id', 'cart-item-' + middle_pre_id)
                                //         .attr('class', 'cart-item-cls-' + middle_pre_id)
                                //         .data('seatId', middle_pre_id)
                                //         .appendTo($cart);
                                //         $('#cart-item-' + last_seat_id).remove();

                                //         $counter.text(sc.find('selected').length + 1);
                                //         var final_amt = amt_for_addition + parseInt(-middle_seat_pre_price)

                                //         $total.text(parseInt(final_amt));

                                //         sc.status(last_seat_id, 'available');

                                //         if (total_final_seat_count == $('#selected-seats li').length) {
                                //             $('#booknow_submit').attr("disabled", false);
                                //         } else {
                                //             $('#booknow_submit').attr("disabled", true);
                                //         }
                                //         return 'available';

                                //         selection_array.spli
                                //     }    
                                   
                                // }    

                                 
                            }   
                        }
                        // हा कोड सीट सिलेक्ट करताना विंडो सीट नाही का हे चेक क्रय साठी वापरला आहे =================================================================================================
                        else
                        {   
                            if(seat_type.indexOf(check_str_economy)==-1 && seat_type.indexOf(check_str_fourth)==-1)
                            {
                                // alert('available 1');
                                $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                .attr('id', 'cart-item-' + this.settings.id)
                                .attr('class', 'cart-item-cls-' + this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart);
                                $counter.text(sc.find('selected').length + 1);
                                $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                            }
                            else if(seat_type.indexOf(check_str_economy)!=-1 && seat_type.indexOf(check_str_fourth)==-1)
                            {
                                // alert('available 2');
                                $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                .attr('id', 'cart-item-' + this.settings.id)
                                .attr('class', 'cart-item-cls-' + this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart);
                                $counter.text(sc.find('selected').length + 1);
                                $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                            }
                        }   

                        if (total_final_seat_count == $('#selected-seats li').length) 
                        {
                            $('#booknow_submit').attr("disabled", false);
                        } else 
                        {
                            $('#booknow_submit').attr("disabled", true);
                        }
                        //seat has been already booked
                
                            return 'selected';
                    } 
                    else if (this.status() == 'selected') 
                    {

                        //update the counter
                        $counter.text(sc.find('selected').length - 1);
                        
                        var selected_cls= this.data().classes;
                        

                        var current_seat_number_id=this.settings.label;
                        var prev_seat_number_id = this.settings.label-1;
                        var next_seat_number_id = parseInt(this.settings.label)+1;
                        var check_str='window';
                        var check_str_window_economy='window-economy-class';
                        var check_str_economy='economy-class';
                        var check_str_window_fourth='window-fourth-class';
                        var check_str_fourth='fourth-class';

                        // हा कोड सीट सिलेक्ट करताना विंडो सीट आहे का हे चेक क्रय साठी  वापरला आहे =================================================================================================
                        if(selected_cls.indexOf(check_str)!=-1)
                        {

                            var clicked_prev=click_id-1;
                            var clicked_next=parseInt(click_id)+1;

                            if(this.settings.label!='1')
                            {
                            var clicked_prev_cls = $("[data_id=" + clicked_prev + "]").attr('class');
                            var clicked_prev_cls_array = clicked_prev_cls.split(" ");
                            }
                            var clicked_next_main_id = $("[data_id=" + clicked_next + "]").attr('id');

                            var clicked_cls = $("[data_id=" + click_id + "]").attr('class');
                            var clicked_cls_array = clicked_cls.split(" ");

                            if(total_seat_count != click_id){
                            var clicked_next_cls = $("[data_id=" + clicked_next + "]").attr('class');
                            var clicked_next_cls_array = clicked_next_cls.split(" ");

                            var next_seat_type = $("[data_id=" + clicked_next + "]").attr('seat_type');
                            }   
                            
                            var prev_seat_type = $("[data_id=" + clicked_prev + "]").attr('seat_type');

                            //हा कोड क्लिक केलेलं विंडो सीट हे १ नंबरच सीट आहे का हे चेक करण्या साठी वापरलं आहे. ================================================================================
                            if(this.settings.label=='1')
                            {
                                var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
                                var current_next_cls_array = current_next_cls.split(" ");
                                    // 
                                if($.inArray('selected', current_next_cls_array) != '-1')
                                {
                                    $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                                }else if($.inArray('available', current_next_cls_array) != '-1')
                                {
                                    $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                    selection_array.splice($.inArray(click_id, selection_array), 1);

                                    var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                    $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                }
                            }
                            //हा कोड सिलेक्ट केलेलं विंडो सीट हे १ नंबरच सीट नाही का हे चेक करण्या साठी वापरलं आहे
                            else if(this.settings.label!='1')
                            {
                                var current_prev_cls = $("[data_id=" + prev_seat_number_id + "]").attr('class');
                                var current_prev_cls_array = current_prev_cls.split(" ");

                               
                                    var current_cls = $("[data_id=" + current_seat_number_id + "]").attr('class');
                                    var current_cls_array = current_cls.split(" ");
                                
                                if(click_id != total_seat_count)
                                {
                                var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
                                var current_next_cls_array = current_next_cls.split(" ");
                            }
                                if(selected_cls.indexOf(check_str_window_economy)==-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {    
                                    
                                    //हा कोड चेक करतो कि क्लिक केलेल्या  विंडो सीटच्या मगच सीट हे उपलब्ध आहे आणि ते मागच सीट हे विंडो सीट नाही 
                                    if($.inArray('available', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1)
                                    {
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                    }
                                    if($.inArray('admin_hold', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1)
                                    {
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                    }
                                    //हा कोड चेक करतो कि क्लिक केलेल्या  विंडो सीटच्या मगच सीट हे उपलब्ध नाही आणि ते मागच सीट हे विंडो सीट नाही 
                                    else if($.inArray('selected', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1)
                                    {
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(this.data().price));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1')
                                    {
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('admin_hold', current_next_cls_array) != '-1')
                                    {
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1')
                                    {
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(this.data().price));
                                    }
                                }else if(selected_cls.indexOf(check_str_window_economy)!=-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {
                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1')
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1')
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        // $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        // var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price));
                                    }
                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('admin_hold', current_next_cls_array) != '-1')
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1 
                                    && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_prev_cls_array) != '-1')
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1 
                                    && current_cls.indexOf(check_str)!=-1 && $.inArray('admin_hold', current_prev_cls_array) != '-1')
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1 
                                    && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price));
                                    }
                                }













// SSSSSSSSSSSSSEEEEEEEEEEEEEEEEEEEEELLLLLLLLLLLLLLLLLLLLLLEEEEEEEEEEEEEEEEEECCCCCCCCCCCCCCCCCCCTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD

                                else if(selected_cls.indexOf(check_str_window_fourth)!=-1 && selected_cls.indexOf(check_str_window_economy)==-1)
                                {
                                    var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');

                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1'
                                            && $.inArray(last_seat_id, selection_array) == '-1')
                                    {
                                        // alert('already_selected1');
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var fourth_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(fourth_cls_for_remove_amt));
                                    }else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1'
                                            && $.inArray(last_seat_id, selection_array) == '-1')
                                    {
                                        // alert('already_selected11');
                                        $('#cart-item-' + this.settings.id).remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        // var fourth_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price));
                                    }else if(clicked_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count && $.inArray(last_row_first_main_id, selection_array) == '-1' 
                                                && $.inArray('available', clicked_prev_cls_array) != '-1')
                                    { 
                                        // alert('already_selected2');
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }else if(clicked_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count && $.inArray(last_row_first_main_id, selection_array) == '-1' 
                                                && $.inArray('selected', clicked_prev_cls_array) != '-1')
                                    { 
                                        // alert('already_selected22');
                                        $('#cart-item-' + this.settings.id).remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        // var fourth_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price));
                                    }
                                    
                                    
                                    
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                    && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1')
                                    {
                                        // alert('already_selected3');
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var fourth_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(fourth_cls_for_remove_amt));
                                    }
                                }    
                            }
                        }
                        // हा कोड चेक करतो कि क्लिक केलेलं सीट हे विंडो सीट नाहीना.
                        else if(selected_cls.indexOf(check_str)==-1)
                        {
                            if(selected_cls.indexOf(check_str_economy)==-1 && selected_cls.indexOf(check_str_fourth)==-1)
                            {
                                // alert('non window else 1');
                                $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                            }else if(selected_cls.indexOf(check_str_economy)!=-1 && selected_cls.indexOf(check_str_fourth)==-1)
                            {
                                // alert('non window else 2');
                                $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                            }else if(selected_cls.indexOf(check_str_fourth)!=-1 && selected_cls.indexOf(check_str_economy)==-1)
                            {
                                // alert('non window else 3');
                                $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                            }
                        }    
                            $('.cart-item-cls-' + this.settings.id).remove();
                            selection_array.splice($.inArray(this.settings.id, selection_array), 1);

                        if (total_final_seat_count == $('#selected-seats li').length) {
                            $('#booknow_submit').attr("disabled", false);
                        } else {
                            $('#booknow_submit').attr("disabled", true);
                        }

                        //seat has been vacated
                        return 'available';

                    } else if (this.status() == 'unavailable') {
                        //seat has been already booked
                        return 'unavailable';
                    } else {
                        return this.style();
                    }

                    //###########################################################################################################################################################################################################################################################################
                },


            });

        //this will handle "[cancel]" link clicks
        $('#selected-seats').on('click', '.cancel-cart-item', function() {
            //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
            sc.get($(this).parents('li:first').data('seatId')).click();
        });
    });






    function recalculateTotal(sc,click_id='',selection_array='') {
                var total = 0;
                sc.find('selected').each(function() {
                    var selected_cls= this.data().classes;
                    var current_seat_number_id=this.settings.label;
                    var prev_seat_number_id = this.settings.label-1;
                    var next_seat_number_id = parseInt(this.settings.label)+1;

                    
                    // हा कोड चेक करतो आहे कि ऑलरेडी सिलेक्ट केलेले सीट्स हे ३ कॅटेगरी आणि ४ कॅटेगरी मधले नाहीना 
                    // if(selected_cls!='window-fourth-class' && selected_cls!='economy-class' && selected_cls!='fourth-class'
                    // && selected_cls!='window-economy-class')
                    // {
                        var check_str='window';
                        var check_str_window_economy='window-economy-class';
                        var check_str_economy='economy-class';
                        var check_str_window_fourth='window-fourth-class';
                        var check_str_fourth='fourth-class';

                        // हा कोड चेक करतो आहे कि ऑलरेडी सिलेक्ट केलेले सीट्स हे विंडो सीट आहे का हे चेक क्रय साठी  वापरला आहे =================================================================================================
                        if(selected_cls.indexOf(check_str)!=-1)
                        {
                            //हा कोड चेक करतो आहे कि ऑलरेडी सिलेक्ट केलेले १ नंबरच सीट आहे का हे चेक करण्या साठी वापरलं आहे. ================================================================================
                            if(this.settings.label=='1')
                            {
                                var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
                                var current_next_cls_array = current_next_cls.split(" ");

                                //हा कोड चेक करतो कि क्लिक केलेलं सीट हे १ नंबरच्या सीटच्या पुढचं सीट नाही आणि ते पुढचं सीट हे सेलेक्टड आहे.
                                if(click_id!=next_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1')
                                {
                                    total += parseInt(this.data().price);    
                                    // total += parseInt(this.data().attr_win);
                                }
                                //हा कोड चेक करतो कि क्लिक केलेलं सीट हे १ नंबरच्या सीटच्या पुढचं सीट नाही आणि ते पुढचं सीट हे उपलब्ध आहे.
                                else if(click_id!=next_seat_number_id && $.inArray('available', current_next_cls_array) != '-1')
                                {
                                    total += parseInt(this.data().price);    
                                    total += parseInt(this.data().attr_win);
                                }
                                    // हा कोड चेक करतो कि क्लिक केलेलं सीट हे १ नंबरच्या सीटच्या पुढचं सीट आहे आणि ते  पुढचं सीट हे आधी उपलब्ध होत पण आता त्यावर क्लिक केलेलं आहे  
                                else if(click_id==next_seat_number_id && ($.inArray('focused', current_next_cls_array) != '-1' 
                                            || $.inArray('available', current_next_cls_array) != '-1'))
                                {    
                                    $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                    selection_array.splice($.inArray(click_id, selection_array), 1);
                                    total += parseInt(this.data().price);    
                                    // हा कोड चेक करतो कि क्लिक केलेलं सीट हे १ नंबरच्या सीटच्या पुढचं सीट आहे आणि ते  पुढचं सीट हे आधी सिलेक्ट केलेलं होत पण आता थे अनसिलेक्ट होईल     
                                } else if(click_id==next_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1')
                                {
                                    $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                    + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                    .attr('id', 'cart-item-' + this.settings.id)
                                    .attr('class', 'cart-item-cls-' + this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);
                                    total += parseInt(this.data().price);    
                                    total += parseInt(this.data().attr_win);
                                }
                            }
                            else if(this.settings.label!='1')
                            {
                                var current_prev_cls = $("[data_id=" + prev_seat_number_id + "]").attr('class');
                                var current_prev_cls_array = current_prev_cls.split(" ");
                                var current_cls = $("[data_id=" + current_seat_number_id + "]").attr('class');
                                var current_cls_array = current_cls.split(" ");

                                if(total_seat_count != this.settings.label){
                                var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
                                var current_next_cls_array = current_next_cls.split(" ");
                                }

                                var prev_seat_type = $("[data_id=" + prev_seat_number_id + "]").attr('seat_type');
                                var current_seat_type = $("[data_id=" + current_seat_number_id + "]").attr('seat_type');


                                // if(selected_cls !='window-economy-class')selected_cls.indexOf(check_str)!=-1
                                if(selected_cls.indexOf(check_str_window_economy)==-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {    
                                    //जर क्लिक केलेल विंडो सीट हे आता रन होत असलेल्या म्हणजेच आधीच सिलेक्ट केलेल सीटच असेल आणि त्याच मगच नॉन विंडो सीट हे उपलब्ध आहे 
                                    if(click_id == current_seat_number_id && click_id!=prev_seat_number_id && $.inArray('available', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('n1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(this.data().price);
                                        total += parseInt(this.data().attr_win);

                                    }
                                    if(click_id == current_seat_number_id && click_id!=prev_seat_number_id 
                                        && $.inArray('admin_hold', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('n1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(this.data().price);
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id == prev_seat_number_id
                                        && ($.inArray('focused', current_prev_cls_array) != '-1' || $.inArray('available', current_prev_cls_array) != '-1')
                                    && current_prev_cls.indexOf(check_str)==-1 && $.inArray('admin_hold', current_next_cls_array) != '-1')
                            {   
                                alert('n2222222222222222222');
                                $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                selection_array.splice($.inArray(click_id, selection_array), 1);
                                total += parseInt(this.data().price);
                            }
                                    else if(click_id == prev_seat_number_id
                                                && ($.inArray('focused', current_prev_cls_array) != '-1' || $.inArray('available', current_prev_cls_array) != '-1')
                                            && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('n2');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(this.data().price);
                                        //जर क्लिक केलेल सीट हे विंडो सीट च्या मगच सीट असेल आणि ते जर विंडो सीट नसेल आणि ते सीट जर हे आधीच सिलेक्ट केलेलं असेल तर 
                                    }else if(click_id == prev_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                            && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('n3');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);

                                    }
                                        // जर क्लिक केलेलं सीट हे आता चालू असलेलाच सीट आहे आणि त्याच्या मागचा  नॉन विंडो सीट हे उपलब्ध नाही 
                                    else if(click_id == current_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('n4');
                                        total += parseInt(this.data().price);    
                                        //जर क्लिक केलेलं सीट हे आता चालू असलेल सीट नाही, त्याच्या मगच सीट हि नाही त्याच्या पुढचं सीट हि नाही 
                                        //आणि त्याच्या मागच सीट हे विंडो सीट नाही पण चालू असलेलं सीट हे  विंडो सीट आहे
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('n5');
                                        total += parseInt(this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('available', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('n6');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('admin_hold', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('n6');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('selected', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('n7');
                                        total += parseInt(this.data().price);    
                                        // total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('selected', current_next_cls_array) != '-1' && current_prev_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('n8');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1  && $.inArray('available', current_next_cls_array) != '-1')
                                    {   
                                        // alert('n9');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1  && $.inArray('admin_hold', current_next_cls_array) != '-1')
                                    {   
                                        // alert('n9');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id == current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1  && $.inArray('available', current_next_cls_array) != '-1')
                                    {   
                                        // alert('n10');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id == current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1  && $.inArray('admin_hold', current_next_cls_array) != '-1')
                                    {   
                                        // alert('n10');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                            && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                            && current_cls.indexOf(check_str)!=-1 && ($.inArray('focused', current_next_cls_array) != '-1' 
                                            || $.inArray('available', current_next_cls_array) != '-1') && $.inArray('available', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n11');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('admin_hold', current_prev_cls_array) != '-1'
                                        && ($.inArray('focused', current_next_cls_array) != '-1' || $.inArray('available', current_next_cls_array) != '-1'))
                                    {   
                                        alert('yyyyyyyyyyyyyyyyyyyyyyyyyyyy');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(this.data().price);      
                                    }
                                    
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_cls.indexOf(check_str)!=-1
                                        && current_next_cls.indexOf(check_str)==-1  && ($.inArray('focused', current_next_cls_array) != '-1' 
                                        || $.inArray('available', current_next_cls_array) != '-1') && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n13');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_cls.indexOf(check_str)!=-1
                                        && current_next_cls.indexOf(check_str)==-1  && ($.inArray('focused', current_next_cls_array) != '-1' 
                                        || $.inArray('available', current_next_cls_array) != '-1') && $.inArray('available', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n14');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1' 
                                        && $.inArray('available', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n15');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1' 
                                        && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n16');
                                        total += parseInt(this.data().price);    
                                        // total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1')
                                    {   
                                        // alert('n17');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                        
                                    }
                                    else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('focused', current_prev_cls_array) != '-1'
                                        && $.inArray('selected', current_next_cls_array) != '-1')
                                    {   
                                        // alert('n18');
                                        total += parseInt(this.data().price);    
                                        // total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1'
                                        && $.inArray('focused', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n19');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {   
                                        // alert('n20');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    } 
                                }
                                else if(selected_cls.indexOf(check_str_window_economy)!=-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {
                                    // alert(current_next_cls_array);
                                    if(click_id == prev_seat_number_id && $.inArray('available', current_next_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls_array.indexOf(check_str)==-1)
                                    {   
                                        // alert('a1');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id == prev_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls_array.indexOf(check_str)==-1)
                                    {   
                                        // alert('a2');
                                        total += parseInt(-this.data().price);    
                                    }else if(click_id == current_seat_number_id && $.inArray('available', current_next_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls_array.indexOf(check_str)==-1)
                                    {   
                                        // alert('a3');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls_array.indexOf(check_str)==-1)
                                    {   
                                        // alert('a4');
                                        total += parseInt(-this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                                && current_cls.indexOf(check_str)!=-1 && ($.inArray('focused', current_next_cls_array) != '-1' 
                                                || $.inArray('available', current_next_cls_array) != '-1'))
                                    {   
                                        // alert('a5');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price);    

                                    }else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                                && current_cls.indexOf(check_str)!=-1 && ($.inArray('selected', current_next_cls_array) != '-1'))
                                    {           
                                        // alert('a6');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && ($.inArray('focused', current_next_cls_array) != '-1' 
                                        || $.inArray('available', current_next_cls_array) != '-1'))
                                    {   
                                        // alert('a55');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);   

                                    }else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && $.inArray('selected', current_next_cls_array) != '-1')
                                    {   
                                        // alert('a55');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);   

                                    }else if(click_id == current_seat_number_id && $.inArray('available', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('a7');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id == current_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('a8');
                                        total += parseInt(-this.data().price);    
                                    }
                                    else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                                && current_cls.indexOf(check_str)!=-1 && ($.inArray('focused', current_prev_cls_array) != '-1' 
                                                || $.inArray('available', current_prev_cls_array) != '-1'))
                                    {   
                                        // alert('a9');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price);    
                                    }else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && ($.inArray('selected', current_prev_cls_array) != '-1'))
                                    {           
                                        // alert('a10');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('available', current_next_cls_array) != '-1' && current_prev_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('a11');
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);

                                    }else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('selected', current_next_cls_array) != '-1' && current_prev_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('a12');
                                        total += parseInt(-this.data().price); 

                                    }else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('available', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('a13');

                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);

                                    }else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('selected', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        // alert('a14');

                                        total += parseInt(-this.data().price); 
                                        // total += parseInt(this.data().attr_win);

                                    }
                                }








// AAAAAAAAAAAAALLLLLLLLLLLLRRRRRRRRRRRRREEEEEEEEEEEEAAAAAAAAAAAAAAAAADDDDDDDDDDDDDDDDDDDDDYYYYYYYYYYYYYY SSSSSSSSSSSSSSSEEEEEEEEEEEEEEEEEELLLLLLLLLLLLEEEEEEEEEECCCCCCCCTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD

                                else if(selected_cls.indexOf(check_str_window_fourth)!=-1 && selected_cls.indexOf(check_str_window_economy)==-1)
                                {
                                    var middle_seat_pre = total_seat_count - 3;
                                    var middle_id = total_seat_count - 2; 
                                    var middle_next_seat = parseInt(middle_id) + parseInt(1);
                                    var last_row_first_id = parseInt(middle_seat_pre) - 1;
                                    var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');

                                    var middle_btn_id = $("[data_id=" + middle_id + "]").attr('id');
                                    var last_row_first_idid = $("[data_id=" + last_row_first_id + "]").attr('id');

                                    var last_row_first_main_id = $("[data_id=" + last_row_first_id + "]").attr('id');
                                    var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');
                                    var middle_next_id = $("[data_id=" + middle_next_seat + "]").attr('id');

                                    var middle_next_seat_string = $("[data_id=" + middle_next_seat + "]").attr('class');
                                    var middle_next_seat_array = middle_next_seat_string.split(" ");
                                //    console.log('current_prev_cls_array',current_prev_cls_array);
                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1'
                                            && $.inArray(last_seat_id, selection_array) == '-1' && click_id != last_row_first_id)
                                    {   
                                        // alert('1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price);    
                                        // total += parseInt(this.data().attr_win);
                                    }
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1 && $.inArray('available', current_next_cls_array) != '-1'
                                            && $.inArray(last_seat_id, selection_array) == '-1' && click_id == last_row_first_id)
                                    {   
                                        // alert('11');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }

                                    else if(current_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count 
                                                && $.inArray(last_row_first_main_id, selection_array) == '-1' && $.inArray('available', current_prev_cls_array) != '-1'
                                                && click_id==last_row_first_id)
                                    {
                                        // alert('2');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }
                                    // else if(click_id==last_row_first_id && current_prev_cls.indexOf(check_str)==-1
                                    //             && $.inArray(last_row_first_main_id, selection_array) != '-1' && $.inArray('available', current_prev_cls_array) != '-1')
                                    // {
                                       // alert('3');
                                    //     $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                    //     total += parseInt(-this.data().price); 
                                    // }
                                    else if(click_id == prev_seat_number_id && total_seat_count == current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_cls.indexOf(check_str)!=-1 
                                        && ($.inArray('selected', current_prev_cls_array) != '-1'))
                                    { 
                                        // alert('4');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == prev_seat_number_id && total_seat_count == current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_cls.indexOf(check_str)!=-1 
                                        && ($.inArray('focused', current_prev_cls_array) != '-1' || $.inArray('available', current_prev_cls_array) != '-1'))
                                    { 
                                        // alert('44');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('available', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('5');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id == current_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('55');
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                    }
                                    
                                    
                                    
                                    else if(click_id == current_seat_number_id && $.inArray('available', current_next_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('6');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id == current_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {   
                                        // alert('66');
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                    }else if(click_id==total_seat_count && current_prev_cls.indexOf(check_str)!=-1
                                                && $.inArray(last_row_first_main_id, selection_array) != '-1' && $.inArray('available', current_next_cls_array) != '-1'
                                                && current_next_cls.indexOf(check_str)==-1)
                                    {
                                        // alert('7');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                    }else if(click_id == next_seat_number_id && current_seat_number_id == last_row_first_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && $.inArray('selected', current_next_cls_array) != '-1')
                                    { 
                                        // alert('8');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }else if(click_id == next_seat_number_id && current_seat_number_id == last_row_first_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && ($.inArray('focused', current_next_cls_array) != '-1' || $.inArray('available', current_next_cls_array) != '-1'))
                                    { 
                                        // alert('88');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                        // total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && ($.inArray('focused', current_next_cls_array) != '-1' 
                                        || $.inArray('available', current_next_cls_array) != '-1'))
                                    {   
                                            // alert('99');
                                            $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                            total += parseInt(-this.data().price);    

                                    }
                                    else if(click_id != prev_seat_number_id  && click_id != current_seat_number_id
                                                && current_seat_number_id==total_seat_count)
                                    {   
                                            // alert('999');
                                            $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                            total += parseInt(-this.data().price);    

                                    }
                                }      
                            }
                        }
                        // हा कोड चेक करतो कि क्लिक केलेलं सीट हे विंडो सीट नाहीना if at 1225
                        else if(selected_cls.indexOf(check_str)==-1)
                        {
                                var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
                                var current_next_cls_array = current_next_cls.split(" ");

                                var current_prev_cls = $("[data_id=" + prev_seat_number_id + "]").attr('class');
                                var current_prev_cls_array = current_prev_cls.split(" ");

                                var prev_seat_type = $("[data_id=" + prev_seat_number_id + "]").attr('seat_type');
                                var current_seat_type = $("[data_id=" + current_seat_number_id + "]").attr('seat_type');

                            if(selected_cls.indexOf(check_str_economy)==-1 && selected_cls.indexOf(check_str_fourth)==-1)
                            {
                                // alert('nonwindow1');
                                total += parseInt(this.data().price);
                            }else if(selected_cls.indexOf(check_str_economy)!=-1 && selected_cls.indexOf(check_str_fourth)==-1)
                            {
                                // alert('nonwindow2');
                                total += parseInt(-this.data().price);
                            }
                            else if(selected_cls.indexOf(check_str_fourth)!=-1 && selected_cls.indexOf(check_str_economy)==-1)
                            {
                                // alert('nonwindow3');
                                total -= parseInt(this.data().price);
                            }
                        }    
                    // }    
            });
            // console.log('total',total);
            return total;
        }    

    //latest function backup on 26/09/2023 12.20 pm
    // function recalculateTotal(sc,click_id='',selection_array='') {
    //         var total = 0;
    //         sc.find('selected').each(function() {
    //             var selected_cls= this.data().classes;

    //             var current_seat_number_id=this.settings.label;
    //             var prev_seat_number_id = this.settings.label-1;
    //             var next_seat_number_id = parseInt(this.settings.label)+1;

    //             if(selected_cls!='window-fourth-class' && selected_cls!='economy-class' && selected_cls!='fourth-class'
    //                && selected_cls!='window-economy-class')
    //             {
    //                 var check_str='window';
    //                 if(selected_cls.indexOf(check_str)!=-1)
    //                 {   
    //                     if(this.settings.label=='1')
    //                     {
    //                         var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
    //                         var current_next_cls_array = current_next_cls.split(" ");

    //                         if(click_id!=next_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1')
    //                         {
    //                             console.log('if1');
    //                             total += parseInt(this.data().price);    
    //                             // total += parseInt(this.data().attr_win);
    //                         }else if(click_id!=next_seat_number_id && $.inArray('available', current_next_cls_array) != '-1')
    //                         {
    //                             console.log('if2');
    //                             total += parseInt(this.data().price);    
    //                             total += parseInt(this.data().attr_win);
    //                         }else
    //                         {
    //                             console.log('if3');
    //                             total += parseInt(this.data().price);
    //                             console.log('selection_array',selection_array);
    //                             $("[attr_win_remove=win_" + this.settings.id + "]").remove();
    //                         }
    //                     }else
    //                     {
    //                         if(click_id==prev_seat_number_id || click_id==next_seat_number_id && $.inArray('available', clicked_cls_array) != '-1' )
    //                         {

    //                             total += parseInt(this.data().price);
    //                             $("[attr_win_remove=win_" + this.settings.id + "]").remove();
    //                             selection_array.splice($.inArray(clicked_id, selection_array), 1);
    //                         }else if(click_id==prev_seat_number_id || click_id==next_seat_number_id && $.inArray('selected', clicked_cls_array) != '-1' )
    //                         {
    //                             $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
    //                             + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
    //                             .attr('id', 'cart-item-' + this.settings.id)
    //                             .attr('class', 'cart-item-cls-' + this.settings.id)
    //                             .data('seatId', this.settings.id)
    //                             .appendTo($cart);

    //                             total += parseInt(this.data().price);
    //                             total += parseInt(this.data().attr_win);
    //                         }else
    //                         {
    //                             total += parseInt(this.data().price);
    //                             total += parseInt(this.data().attr_win);
    //                         }

    //                     }
    //                 }else
    //                 {
    //                     console.log('else1');
    //                     total += parseInt(this.data().price);
    //                 }    
    //             }    
    //     });
    //     return total;
    // }    




    
    // function recalculateTotal(sc,click_id='',selection_array='') {
    //     var total = 0;
    //     //basically find every selected seat and sum its price

    //     sc.find('selected').each(function() {
    //         console.log('this.data().classes',this.settings.label);
    //         var selected_cls= this.data().classes;
    //     if(selected_cls!='window-fourth-class' && selected_cls!='economy-class' && selected_cls!='fourth-class'
    //     && selected_cls!='window-economy-class'){
    //         var check_str='window';
    //         if(selected_cls.indexOf(check_str)!=-1)
    //         {
    //             console.log("click_id",click_id);
    //             if(click_id!=1){
    //                 var clicked_prev=click_id-1;
    //                 var clicked_next=parseInt(click_id)+1;
    //                 var prev_id_str=clicked_prev.toString();
    //                 var next_id_str=clicked_next.toString();
                
    //                 var clicked_cls = $("[data_id=" + click_id + "]").attr('class');
    //                 var clicked_cls_array = clicked_cls.split(" ");
    //                 var clicked_id = $("[data_id=" + click_id + "]").attr('id');


    //                 var clicked_prev_cls = $("[data_id=" + clicked_prev + "]").attr('class');
    //                 var clicked_prev_cls_array = clicked_prev_cls.split(" ");

    //                 var clicked_next_cls = $("[data_id=" + clicked_next + "]").attr('class');
    //                 var clicked_next_cls_array = clicked_next_cls.split(" ");
                    
    //                 var current_seat_number_id=this.settings.label;
    //                 var prev_seat_number_id = this.settings.label-1;
    //                 var next_seat_number_id = parseInt(this.settings.label)+1;

    //                 if(current_seat_number_id == '1'){
    
    //                     var current_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
    //                     var current_next_cls_array = current_next_cls.split(" ");

    //                     if(click_id!=prev_seat_number_id && click_id!=next_seat_number_id && $.inArray('selected', current_next_cls_array) != '-1'){
    //                         total += parseInt(this.data().price);
    //                         // total += parseInt(this.data().attr_win);
    
    //                     }
    //                 }else{

    //                 if(click_id==prev_seat_number_id || click_id==next_seat_number_id && $.inArray('selected', clicked_cls_array) == '-1' ){
    //                     total += parseInt(this.data().price);
    //                     // total += parseInt(this.data().attr_win);
    //                     // attr_win_remove="win_'+ this.settings.id +'"
    //                     console.log('selection_array',selection_array);
    //                     $("[attr_win_remove=win_" + this.settings.id + "]").remove();
    //                     selection_array.splice($.inArray(clicked_id, selection_array), 1);

    //                     // $('.cart-item-cls-' + this.settings.id).remove();

    //                 }else if(click_id==prev_seat_number_id || click_id==next_seat_number_id && $.inArray('selected', clicked_cls_array) != '-1' ){
    //                     total += parseInt(this.data().price);
    //                     total += parseInt(this.data().attr_win);

    //                     $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
    //                     + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
    //                         .attr('id', 'cart-item-' + this.settings.id)
    //                         .attr('class', 'cart-item-cls-' + this.settings.id)
    //                         .data('seatId', this.settings.id)
    //                         .appendTo($cart);
    //                     // attr_win_remove="win_'+ this.settings.id +'"
    //                     // $("[attr_win_remove=win_" + this.settings.id + "]").remove();
    //                     // $('.cart-item-cls-' + this.settings.id).remove();

    //                 }

    //             }
    //             }else{
    //                 var next_seat_number_id = parseInt(this.settings.label)+1;
    //                 var selected_next_cls = $("[data_id=" + next_seat_number_id + "]").attr('class');
    //                 var selected_next_cls_array = selected_next_cls.split(" ");
    //                 console.log('outer_if');
    //                 if($.inArray('selected', selected_next_cls_array) == '-1' ){
    //                 console.log('inner_if');
    //                     total += parseInt(this.data().price);
    //                     total += parseInt(this.data().attr_win);
    //                 }else if($.inArray('selected', selected_next_cls_array) != '-1' ){
    //                 console.log('inner_else');
    //                     total += parseInt(this.data().price);
    //                     // total += parseInt(this.data().attr_win);
    //                 }
                    
                    
                    
    //             }
    //         }else{

    //             var clicked_prev=click_id-1;
    //             var clicked_next=parseInt(click_id)+1;
    //             var prev_id_str=clicked_prev.toString();
	// 			var next_id_str=clicked_next.toString();






    //             console.log('2');
    //             total += parseInt(this.data().price);
    //         }    
    //     }else if(selected_cls=='economy-class' || selected_cls=='fourth-class'){
    //         console.log('3');
    //         total -= parseInt(this.data().price);
    //     }else if(selected_cls=='window-economy-class' || selected_cls=='window-fourth-class'){
    //         console.log('4');

    //         total -= parseInt(this.data().price);
    //         total += parseInt(this.data().attr_win);
    //     }     
    //     });

    //     return total;
    // }

    // function recalculateTotal(sc) {
    //     var total = 0;

    //     //basically find every selected seat and sum its price
    //     sc.find('selected').each(function() {
            
    //     if(this.data().classes=='window-fourth-class' || this.data().classes=='economy-class' || this.data().classes=='fourth-class'
    //     || this.data().classes=='window-seconomy-class'){
    //                 // var clicked_next_cls_array = clicked_next_cls.split(" ");
    //         var without_window_seat=this.data().price- parseInt(array_data.window_class_price);
    //         total += without_window_seat;
    //     }else{
    //         total += this.data().price;
    //     }    
    //     });

    //     return total;
    // }


    $(function() {
        $('#checkout-button').click(function() {
            var items = $('#selected-seats li');
            if (items.length <= 0) {
                alert("Please select atleast 1 seat first.")
                return false;
            }
            var selected = [];
            items.each(function(e) {
                var id = $(this).attr('id')
                id = id.replace("cart-item-", "")
                selected.push(id)
            })
            if (Object.keys(booked).length > 0) {
                Object.keys(booked).map(k => {
                    selected.push(booked[k])
                })
            }
            localStorage.setItem('booked', JSON.stringify(selected))
            alert("Seats has been Reserved successfully.")
            location.reload()
        })


        $('#reset-btn').click(function() {
            if (confirm("are you sure to reset the reservation of the bus?") === true) {
                localStorage.removeItem('booked')
                alert("Seats has been Reset successfully.")
                location.reload()
            }
        })
    })

    function add_to_cart(last_row_first_id, middle_btn_id, last_row_first_idid, $cart) {

        var last_row_first = $("[data_id=" + last_row_first_id + "]").attr('seat_type');
        var last_row_first_label = $("[data_id=" + last_row_first_id + "]").text();
        var last_row_first_price = $("[data_id=" + last_row_first_id + "]").attr('seat_price');

        $('<li>' + last_row_first + ' Seat # ' + last_row_first_label + ': <b>Rs. ' + last_row_first_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
            .attr('id', 'cart-item-' + last_row_first_idid)
            .attr('class', 'cart-item-cls-' + last_row_first_idid)
            .data('seatId', last_row_first_idid)
            .appendTo($cart);

        $('#cart-item-' + middle_btn_id).remove();
        selection_array.splice($.inArray(middle_btn_id, selection_array), 1);
    }


    function add_to_cart_middle_next(total_seat_count, middle_btn_id, last_seat_id, $cart) {

        var last_row_first = $("[data_id=" + total_seat_count + "]").attr('seat_type');
        var last_row_first_label = $("[data_id=" + total_seat_count + "]").text();
        var last_row_first_price = $("[data_id=" + total_seat_count + "]").attr('seat_price');

        $('<li>' + last_row_first + ' Seat # ' + last_row_first_label + ': <b>Rs. -' + last_row_first_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
            .attr('id', 'cart-item-' + last_seat_id)
            .attr('class', 'cart-item-cls-' + last_seat_id)
            .data('seatId', last_seat_id)
            .appendTo($cart);

        $('#cart-item-' + middle_btn_id).remove();
        selection_array.splice($.inArray(middle_btn_id, selection_array), 1);
    }

    function add_to_cart_new(middle_next_seat, last_row_first_idid, middle_next_id, $cart) {

        var last_row_first = $("[data_id=" + middle_next_seat + "]").attr('seat_type');
        var last_row_first_label = $("[data_id=" + middle_next_seat + "]").text();

        if (last_row_first == 'economy-class') {
            var last_row_first_price = economy_cls_amt;
        } else if (last_row_first == 'window-economy-class') {
            var last_row_first_price = economy_cls_window_amt;
        } else if (last_row_first == 'second-class') {
            var last_row_first_price = second_cls_amt;
        } else if (last_row_first == 'window-second-class') {
            var last_row_first_price = second_cls_window_amt;
        } else if (last_row_first == 'first-class') {
            var last_row_first_price = first_cls_amt;
        } else if (last_row_first == 'window-first-class') {
            var last_row_first_price = first_cls_window_amt;
        }


        $('<li>' + last_row_first + ' Seat # ' + last_row_first_label + ': <b>Rs. ' + last_row_first_price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
            .attr('id', 'cart-item-' + middle_next_id)
            .attr('class', 'cart-item-cls-' + middle_next_id)
            .data('seatId', middle_next_id)
            .appendTo($cart);

        $('#cart-item-' + last_row_first_idid).remove();
    }
}    