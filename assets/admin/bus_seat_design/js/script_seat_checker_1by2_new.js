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
    console.log('final_filtered_afinal_filtered_afinal_filtered_a',final_filtered_a);


    var elementCount = {};

for (var i = 0; i < final_filtered_a.length; i++) {
    var element = final_filtered_a[i];
    if (elementCount[element]) {
        elementCount[element]++;
    } else {
        elementCount[element] = 1;
    }
}



        var first_cls_count = elementCount['e'];

      // Mapping for seat classes
      var classMapping = {
        'f': 'a_fa',
        's': 'b_sb',
        'e': 'c_ec',
        'v': 'dvvd'
    };

    var resultArray = [];

    for (var i = 0; i < final_filtered_a.length; i++) {
        var char = final_filtered_a[i];
        var formattedSeat = classMapping[char];
        resultArray.push(formattedSeat);

        final_filtered_a.splice(i, 1);
        i--;
    }

    var first_cls_cnt_for_seat_group=first_cls_cnt/3;
    var second_cls_cnt_for_seat_group=second_cls_cnt/3;
    var economy_cls_cnt_for_seat_group=economy_cls_cnt/3;
    var fourth_cls_cnt_or_seat_group=fourth_cls_cnt/3;

    var countToRemove_first_cls = first_cls_cnt_for_seat_group;

    var result_first_cls = [];
    var aFaCount = 0;
    
    for (var i = 0; i < resultArray.length; i++) {
        var element = resultArray[i];
    
        if (element === 'a_fa' && aFaCount < countToRemove_first_cls) {
            result_first_cls.push(element);
            aFaCount++;
        }
    }
    

    
var countToRemove_second_cls = second_cls_cnt_for_seat_group; // Number of 'b_sb' to keep

var result_second_cls = [];
var bSbCount = 0;

for (var i = 0; i < resultArray.length; i++) {
    var element = resultArray[i];

    if (element === 'b_sb' && bSbCount < countToRemove_second_cls) {
        result_second_cls.push(element);
        bSbCount++;
    } 
}

var countToRemove_economy_cls = economy_cls_cnt_for_seat_group; // Number of 'b_sb' to keep
var result_economy_cls = [];
var cecCount = 0;

for (var i = 0; i < resultArray.length; i++) {
    var element = resultArray[i];

    if (element === 'c_ec' && cecCount < countToRemove_economy_cls) {
        result_economy_cls.push(element);
        cecCount++;
    } 
}

var countToRemove_fourth_cls = fourth_cls_cnt_or_seat_group; // Number of 'b_sb' to keep
var result_fourth_cls = [];
var dvdCount = 0;

for (var i = 0; i < resultArray.length; i++) {
    var element = resultArray[i];

    if (element === 'd_vd' && dvdCount < countToRemove_fourth_cls) {
        result_fourth_cls.push(element);
        dvdCount++;
    } 
}
    

    var numbersArray = result_first_cls.concat(result_second_cls, result_economy_cls, result_fourth_cls);
    var array_final = numbersArray;
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
                                // if($.inArray('available', clicked_next_cls_array) != '-1')
                                if(clicked_next_cls.indexOf(check_str)==-1)
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
                                    if($.inArray('available', clicked_prev_cls_array) != '-1' && prev_seat_type.indexOf(check_str)==-1
                                                    && clicked_next_cls.indexOf(check_str)!=-1)
                                    {  
                                        alert('1');
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
                                    if($.inArray('admin_hold', clicked_prev_cls_array) != '-1' && prev_seat_type.indexOf(check_str)==-1
                                                    && clicked_next_cls.indexOf(check_str)!=-1)
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
                                    else if($.inArray('selected', clicked_prev_cls_array) != '-1' && prev_seat_type.indexOf(check_str)==-1
                                                && clicked_next_cls.indexOf(check_str)!=-1)
                                    {           
                                        alert('2');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);

                                        $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                                    }
                                        //हा कोड चेक करतो कि सिलेक्ट केलेलं विंडो सीटच्या पुढचं सीट हे विंडो सीट नाही आणि ये उपलब्ध आहे  पण मगच सीट हे विंडो सीट आहे  
                                    else if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1)
                                    {                
                                        alert('3');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);

                                        $total.text(recalculateTotal(sc,click_id,selection_array) + this.data().price);
                                    }
                                    
                                }else if(seat_type.indexOf(check_str_window_economy)!=-1 && seat_type.indexOf(check_str_window_fourth)==-1)
                                {
                                    if(clicked_prev_cls.indexOf(check_str)!=-1 &&  clicked_next_cls.indexOf(check_str)==-1)
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
                                     else if(clicked_prev_cls.indexOf(check_str)==-1 &&  clicked_next_cls.indexOf(check_str)!=-1
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

                                } 


                                else if(seat_type.indexOf(check_str_window_fourth)!=-1 && seat_type.indexOf(check_str_window_economy)==-1)
                                {
                                    var middle_pre_id = $("[data_id=" + middle_seat_pre + "]").attr('id');
                                    var last_row_first_main_id = $("[data_id=" + last_row_first_id + "]").attr('id');
                                    var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');
                                    var middle_next_id = $("[data_id=" + middle_next_seat + "]").attr('id');

                                    var middle_next_seat_string = $("[data_id=" + middle_next_seat + "]").attr('class');
                                    var middle_next_seat_array = middle_next_seat_string.split(" ");

                                    var middle_seat_pre_string = $("[data_id=" + middle_seat_pre + "]").attr('class');
                                    var middle_seat_pre_array = middle_seat_pre_string.split(" ");

                                    if(clicked_prev_cls.indexOf(check_str)!=-1 && clicked_next_cls.indexOf(check_str)==-1)
                                    { 
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + parseInt(-this.data().price));
                                    } 
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 && click_id==total_seat_count
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
                                    }
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 && click_id==total_seat_count
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
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 && click_id==total_seat_count 
                                                && $.inArray('selected', clicked_prev_cls_array) != '-1')
                                    { 
                                        $('<li class="cart-item-cls-'+ this.settings.id +'">' + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. -' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        $counter.text(sc.find('selected').length + 1);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) + parseInt(-this.data().price));
                                    }  
                                   
                                } 

                                 
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
                            else if(seat_type.indexOf(check_str_fourth)!=-1 && seat_type.indexOf(check_str_economy)==-1)
                            {
                                alert('available 3');
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
                                   
                                    $total.text(recalculateTotal(sc,click_id,selection_array) - this.data().price);
                                
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
                                    if($.inArray('available', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                                    && current_next_cls.indexOf(check_str)!=-1)
                                    {
                                        alert('selected1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                    }
                                    else if($.inArray('admin_hold', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                                    && current_next_cls.indexOf(check_str)!=-1)
                                    {
                                        alert('selected1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var win_price_for_remove = parseInt(this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(win_price_for_remove));
                                    }
                                    //हा कोड चेक करतो कि क्लिक केलेल्या  विंडो सीटच्या मगच सीट हे उपलब्ध नाही आणि ते मागच सीट हे विंडो सीट नाही 
                                    else if($.inArray('selected', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                                        && current_next_cls.indexOf(check_str)!=-1)
                                    {
                                        alert('selected2');
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(this.data().price));
                                    }
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {
                                        alert('selected3');
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(this.data().price));
                                    }
                                }else if(selected_cls.indexOf(check_str_window_economy)!=-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {
                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {
                                        $('#cart-item-' + this.settings.id).remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price))
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


                                else if(selected_cls.indexOf(check_str_window_fourth)!=-1 && selected_cls.indexOf(check_str_window_economy)==-1)
                                {
                                    var last_seat_id = $("[data_id=" + total_seat_count + "]").attr('id');

                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1)
                                    {
                                        // alert('already_selected1');
                                        $('#cart-item-' + this.settings.id).remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price));
                                    }
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count
                                                && $.inArray('available', clicked_prev_cls_array) != '-1')
                                    { 
                                        // alert('already_selected2');
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count
                                                && $.inArray('admin_hold', clicked_prev_cls_array) != '-1')
                                    { 
                                        // alert('already_selected2');
                                        $('#cart-item-' + this.settings.id).remove();
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        var economy_cls_for_remove_amt = parseInt(-this.data().price) +  parseInt(this.data().attr_win);
                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(economy_cls_for_remove_amt));
                                    }
                                    else if(clicked_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count
                                                && $.inArray('selected', clicked_prev_cls_array) != '-1')
                                    { 
                                        // alert('already_selected22');
                                        $('#cart-item-' + this.settings.id).remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);

                                        $total.text(recalculateTotal(sc,click_id,selection_array) - parseInt(-this.data().price));
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

                                    total += parseInt(this.data().price);    
                                  
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


                                if(selected_cls.indexOf(check_str_window_economy)==-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {    
                                    //जर क्लिक केलेल विंडो सीट हे आता रन होत असलेल्या म्हणजेच आधीच सिलेक्ट केलेल सीटच असेल आणि त्याच मगच नॉन विंडो सीट हे उपलब्ध आहे 
                                    if(click_id == current_seat_number_id && click_id!=prev_seat_number_id && $.inArray('available', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('n1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(this.data().price);
                                        total += parseInt(this.data().attr_win);

                                    }
                                    if(click_id == current_seat_number_id && click_id!=prev_seat_number_id && $.inArray('admin_hold', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('n1');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(this.data().price);
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id == prev_seat_number_id
                                                && ($.inArray('focused', current_prev_cls_array) != '-1' || $.inArray('available', current_prev_cls_array) != '-1')
                                            && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('n2');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(this.data().price);
                                        //जर क्लिक केलेल सीट हे विंडो सीट च्या मगच सीट असेल आणि ते जर विंडो सीट नसेल आणि ते सीट जर हे आधीच सिलेक्ट केलेलं असेल तर 
                                    }else if(click_id == prev_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                            && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('n3');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                                && $.inArray('available', current_prev_cls_array) != '-1')
                                    {   
                                        alert('n11');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {   
                                        alert('n12');
                                        total += parseInt(this.data().price);    

                                    }
                                        // जर क्लिक केलेलं सीट हे आता चालू असलेलाच सीट आहे आणि त्याच्या मागचा  नॉन विंडो सीट हे उपलब्ध नाही 
                                    else if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1)
                                    {   
                                        alert('n4');
                                        total += parseInt(this.data().price);    
                                        //जर क्लिक केलेलं सीट हे आता चालू असलेल सीट नाही, त्याच्या मगच सीट हि नाही त्याच्या पुढचं सीट हि नाही 
                                        //आणि त्याच्या मागच सीट हे विंडो सीट नाही पण चालू असलेलं सीट हे  विंडो सीट आहे
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id == current_seat_number_id
                                            && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1 
                                            && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {   
                                        alert('n10');
                                        total += parseInt(this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && $.inArray('available', current_prev_cls_array) != '-1')
                                    {   
                                        alert('n111');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && $.inArray('admin_hold', current_prev_cls_array) != '-1')
                                    {   
                                        alert('n111');
                                        total += parseInt(this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {   
                                        alert('n1111');
                                        total += parseInt(this.data().price);    
                                    }
                                }
                                else if(selected_cls.indexOf(check_str_window_economy)!=-1 && selected_cls.indexOf(check_str_window_fourth)==-1)
                                {
                                    if(click_id == prev_seat_number_id && current_prev_cls.indexOf(check_str)!=-1
                                                && current_next_cls_array.indexOf(check_str)==-1)
                                    {   
                                        alert('a1');
                                        total += parseInt(-this.data().price);    
                                    }
                                    else if(click_id == current_seat_number_id  
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls_array.indexOf(check_str)==-1)
                                    {   
                                        alert('a3');
                                        total += parseInt(-this.data().price);    
                                    }
                                    else if(click_id != prev_seat_number_id && click_id == next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a55');
                                        total += parseInt(-this.data().price);    

                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('available', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a7');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('admin_hold', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a7');
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a8');
                                        total += parseInt(-this.data().price);    
                                    }
                                    else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                                && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                                && current_cls.indexOf(check_str)!=-1 && ($.inArray('focused', current_prev_cls_array) != '-1' 
                                                || $.inArray('available', current_prev_cls_array) != '-1'))
                                    {   
                                        alert('a9');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price);    
                                    }else if(click_id == prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_next_cls.indexOf(check_str)!=-1
                                        && current_cls.indexOf(check_str)!=-1 && ($.inArray('selected', current_prev_cls_array) != '-1'))
                                    {           
                                        alert('a10');
                                        $('<li class="cart-item-cls-'+ this.settings.id +'" attr_win_remove="win_'+ this.settings.id +'">'
                                        + this.data().category + ' Seat # ' + this.settings.label + ': <b>Rs. ' + this.data().attr_win + '</b></li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .attr('class', 'cart-item-cls-' + this.settings.id)
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id
                                                && current_prev_cls.indexOf(check_str)!=-1 && current_cls.indexOf(check_str)!=-1 
                                                && current_next_cls.indexOf(check_str)==-1)
                                    {   
                                        alert('a11');
                                        total += parseInt(-this.data().price); 
                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('available', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a13');

                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('admin_hold', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a13');

                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);

                                    }
                                    else if(click_id != prev_seat_number_id && click_id != next_seat_number_id && click_id != current_seat_number_id &&
                                        $.inArray('selected', current_prev_cls_array) != '-1' && current_prev_cls.indexOf(check_str)==-1
                                        && current_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)!=-1)
                                    {   
                                        alert('a14');

                                        total += parseInt(-this.data().price); 
                                    }
                                }
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
                                   
                                    if(current_prev_cls.indexOf(check_str)!=-1 && current_next_cls.indexOf(check_str)==-1 
                                            && current_cls.indexOf(check_str)!=-1)
                                    {   
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price);    
                                    }
                                    else if(current_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count 
                                                && $.inArray('available', current_prev_cls_array) != '-1')
                                    {
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(current_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count 
                                    && $.inArray('admin_hold', current_prev_cls_array) != '-1')
                                    {
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(current_prev_cls.indexOf(check_str)==-1 &&  click_id==total_seat_count 
                                                && $.inArray('selected', current_prev_cls_array) != '-1')
                                    {
                                        total += parseInt(-this.data().price); 
                                    }

                                    else if(click_id == prev_seat_number_id && total_seat_count == current_seat_number_id
                                        && current_prev_cls.indexOf(check_str)==-1 && current_cls.indexOf(check_str)!=-1 
                                        && ($.inArray('selected', current_prev_cls_array) != '-1'))
                                    { 
                                        alert('4');
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
                                        alert('44');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        total += parseInt(-this.data().price); 
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('available', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        alert('5');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('admin_hold', current_prev_cls_array) != '-1' 
                                    && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        alert('5');
                                        $("[attr_win_remove=win_" + this.settings.id + "]").remove();
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                        total += parseInt(this.data().attr_win);
                                    }
                                    else if(click_id == current_seat_number_id && $.inArray('selected', current_prev_cls_array) != '-1' 
                                                && current_prev_cls.indexOf(check_str)==-1)
                                    {   
                                        alert('55');
                                        selection_array.splice($.inArray(click_id, selection_array), 1);
                                        total += parseInt(-this.data().price);    
                                    }
                                 
                                    else if(click_id != prev_seat_number_id  && click_id != current_seat_number_id
                                                && current_seat_number_id==total_seat_count)
                                    {   
                                            alert('999');
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
                                total += parseInt(this.data().price);
                            }else if(selected_cls.indexOf(check_str_economy)!=-1 && selected_cls.indexOf(check_str_fourth)==-1)
                            {
                                total += parseInt(-this.data().price);
                            }
                            else if(selected_cls.indexOf(check_str_fourth)!=-1 && selected_cls.indexOf(check_str_economy)==-1)
                            {
                                total -= parseInt(this.data().price);
                            }
                        }    
            });
            return total;
        }    


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