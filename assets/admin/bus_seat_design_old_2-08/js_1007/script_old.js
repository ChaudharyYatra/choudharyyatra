// var bus_data='<?php'+$bus_info+';?>';

var did=[];
did = $('#bdata').val();

var array_data=js_array;
var first_cls_cnt=array_data.first_cls_cnt;
var second_cls_cnt=array_data.second_cls_cnt;
var economy_cls_cnt=array_data.economy_cls_cnt;
var total_seat_count=parseInt(first_cls_cnt)+ parseInt(second_cls_cnt)+ parseInt(economy_cls_cnt);
var first_cls_amt=parseInt(array_data.first_class_seat_price); 
var first_cls_window_amt=first_cls_amt + parseInt(array_data.window_seat_price); 
var second_cls_amt=parseInt(array_data.secound_class_seat_price); 
var second_cls_window_amt=second_cls_amt  + parseInt(array_data.window_seat_price); 
var economy_cls_amt=parseInt(array_data.economy_seat_price); 
var economy_cls_window_amt=economy_cls_amt  + parseInt(array_data.window_seat_price); 
var abc=[];
for(var i=0;i<first_cls_cnt; i++)
{
    var new_i=i+2;

    abc.splice(new_i, new_i,'f');    
}
//  console.log(first_cls_cnt);

var myString = "";
for (var i = 0; i < abc.length; i++) {

    myString += abc[i];
    if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0) {
        myString += "_";
    }
    var ooo=abc.length-1;
    if ((i + 1) % 4 === 0) {
        myString = myString.substring(0, myString.length-1);
        myString += "a,";
    }else if((i + 1) % 4 === 1 && i!=0)
    {
        myString = myString.substring(0, myString.length-1);
        myString += "a";
    }

}


var xyz=[];
for(var j=0;j<second_cls_cnt; j++)
{
    xyz.splice(j, j,'s');    
}

var myString_second = "";
for (var i = 0; i < xyz.length; i++) {

    myString_second += xyz[i];
    if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0) {
        myString_second += "_";
    }
    var ooo=xyz.length-1;
    if ((i + 1) % 4 === 0) {
        myString_second = myString_second.substring(0, myString_second.length-1);
        myString_second += "b,";
    }else if((i + 1) % 4 === 1 && i!=0)
    {
        myString_second = myString_second.substring(0, myString_second.length-1);
        myString_second += "b";
    }else if(i==0)
    {
        myString_second = myString_second.substring(0, myString_second.length-1);
        myString_second += "b";
    }
}
// console.log(myString_second);


var pqr=[];
for(var k=0;k<economy_cls_cnt; k++)
{
    pqr.splice(k, k,'e');    
}

var myString_economy = "";
for (var i = 0; i < pqr.length; i++) {

    myString_economy += pqr[i];

var remain= pqr.length-i;
    if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0 && remain>5) {
        myString_economy += "_";
    }
    var ooo=pqr.length-1;
    if ((i + 1) % 4 === 0 && remain>2) {
        myString_economy = myString_economy.substring(0, myString_economy.length-1);
        myString_economy += "c,";
    }else if((i + 1) % 4 === 1 && i!=0)
    {
        myString_economy = myString_economy.substring(0, myString_economy.length-1);
        myString_economy += "c";
    }else if(i==0)
    {
        myString_economy = myString_economy.substring(0, myString_economy.length-1);
        myString_economy += "c";
    }
}

// console.log(myString_economy);
var numbersArray = myString.split(',');
var numbersArray_second = myString_second.split(',');
var numbersArray_economy = myString_economy.split(',');

var array_final = numbersArray.concat(numbersArray_second, numbersArray_economy);
var final_filtered = array_final.filter(elm => elm);
// console.log(final_filtered);
var firstSeatLabel = 1;
var booked = !!localStorage.getItem('booked') ? $.parseJSON(localStorage.getItem('booked')) : [];
$(document).ready(function() {
    // alert(first_cls_amt);
     var selection_array=[];
    var $cart = $('#selected-seats'),
        $counter = $('#counter'),
        $total = $('#total'),
        sc = $('#bus-seat-map').seatCharts({
            map:final_filtered,
            seats: {
                f: {
                    price: first_cls_amt,
                    classes: 'first-class', //your custom CSS class
                    category: 'First Class'
                },
                s: {
                    price: second_cls_amt,
                    classes: 'second-class', //your custom CSS class
                    category: 'Second Class'
                },
                e: {
                    price: economy_cls_amt,
                    classes: 'economy-class', //your custom CSS class
                    category: 'Economy Class'
                },
                z: {
                    price: 100,
                    classes: 'free-class', //your custom CSS class
                    category: 'Free Class'
                },
                x: {
                    price: 0,
                    classes: 'free-class', //your custom CSS class
                    category: 'Free Class'
                },
                a: {
                    price: first_cls_window_amt,
                    classes: 'window-first-class', //your custom CSS class
                    category: 'Window Class'
                },
                b: {
                    price: second_cls_window_amt,
                    classes: 'window-second-class', //your custom CSS class
                    category: 'Window Class'
                },
                c: {
                    price: economy_cls_window_amt,
                    classes: 'window-economy-class', //your custom CSS class
                    category: 'Window Class'
                }
            },
            naming: {
                top: false,
                getLabel: function(character, row, column) {
                    // var car_set=character;
                    // if(car_set!='z')
                    // {
                    return firstSeatLabel++;
                    // }else if(car_set='z')
                    // {
                    //     firstSeatLabel='A';
                    // }else if(car_set='z')
                    // {
                    //     firstSeatLabel='A';
                    // }
                },
            },
            legend: {
                node: $('#legend'),
                items: [
                    ['f', 'available', 'First Class'],
                    ['e', 'available', 'Economy Class'],
                    ['f', 'unavailable', 'Already Booked'],
                    ['a', 'freeze', 'Already'],
                    ['z', 'available window', 'Available Window'],
                    ['x', 'not for select', 'Not For Select'],
                ]
            },
            click: function() {
                var selectedSeats = [];
                var seatIndex = $(this).attr('id');
                // var seatIndex = $(this).attr('id');
                // console.log(seatIndex);


                // selectedSeats.push(seatIndex);
                // console.log(selectedSeats);
                // console.log(this.data());
                // var click_id=this.settings.id;

                // selection_array.push(this.settings.id); 

                var click_id=this.settings.$node.attr('data_id');
                var middle_seat_pre=total_seat_count-3;
                var middle_id=total_seat_count-2;

// alert(middle_seat_pre);
// alert(click_id);
                // if($.inArray(click_id, selection_array)!= '-1')
                // {
                //     alert('1');
                // }
                // else
                // {
                //     alert('2');
                // selection_array.push(this.settings.id); 
                // console.log(selection_array);
                // }
//1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
                selection_array.push(this.settings.id);
                if(click_id==middle_seat_pre)
                {
                    
                // var middle_id=parseInt(click_id)+parseInt(1);
                var middle_btn_id = $("[data_id="+middle_id+"]").attr('id');   
                
                alert(middle_btn_id);

                       if($.inArray(middle_btn_id, selection_array)!= '-1')
                {
                var last_row_first_id=parseInt(middle_seat_pre)-1;

                var last_row_first_cls = $("[data_id="+last_row_first_id+"]").attr('class');
                 var last_row_first_cls_array=last_row_first_cls.split(" ");
                 if($.inArray('available', last_row_first_cls_array)!= '-1')
                 {
                //    $("[data_id="+middle_id+"]").removeAttr('class');
                   $("[data_id="+middle_id+"]").attr('class',"seatCharts-seat seatCharts-cell economy-class available");
                   $("[data_id="+last_row_first_id+"]").attr('class',"seatCharts-seat seatCharts-cell economy-class selected");
                }else{

                var middle_next_seat=parseInt(middle_id)+parseInt(1);
                alert(middle_next_seat);
                alert(total_seat_count);

                var middle_next_seat_array = $("[data_id="+middle_next_seat+"]").attr('class');
                var last_seat_array = $("[data_id="+total_seat_count+"]").attr('class');
console.log(middle_next_seat_array);
alert($.inArray('available', last_seat_array));
console.log(last_seat_array);
                if(($.inArray('available', middle_next_seat_array)!= '-1') && ($.inArray('available', last_seat_array)!= '-1'))
                {
                    var middle_next_seat_array = $("[data_id="+middle_next_seat+"]").attr('class',"seatCharts-seat seatCharts-cell economy-class selected");
                    var last_seat_array = $("[data_id="+total_seat_count+"]").attr('class',"seatCharts-seat seatCharts-cell window-economy-class selected");
                }
                else{
                    alert('notavailable');
                    var middle_next_seat_array = $("[data_id="+middle_next_seat+"]").attr('class',"seatCharts-seat seatCharts-cell economy-class selected");
                    var last_seat_array = $("[data_id="+total_seat_count+"]").attr('class',"seatCharts-seat seatCharts-cell window-economy-class selected");

                }

                }
                }
                else
                {
                    alert('2');
                selection_array.push(this.settings.id); 
                console.log(selection_array);
                }





                // var pre_id=click_id-1;
                // var att_cls = $("[data_id="+pre_id+"]").attr('class');
                // var cls_array=att_cls.split(" ");
                
                // if($.inArray('available', cls_array)!= '-1')
                // {

                //     // var att_cls = $("[data_id="+pre_id+"]").attr('class',);   

                //     console.log('okk');
                // }else{
                //     console.log('eeeeeeee');

                //     // alert('error');
                // }
            }
                // var all_cls=explode


             
                //  console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
                //  var previousSeat = $(this).prev().find('.available').attr('id');
                //  var attributes = previousSeat[0].attributes;
                //  var qty = $(this).parent().siblings('.available').attr('id');
                //  var row = previousSeat.attr('id');
                //  console.log(previousSeat);

                //  var previousSeat = $(this).prev('.available ');
                //  console.log(previousSeat.attr('id'));
                //  var prevSeatIndex = previousSeat.index();
                //  console.log(previousSeat);


                if (this.status() == 'available') {
                //     if(this.data().category=='Window Class'){
                //     //let's create a new <li> which we'll add to the cart items
                //     $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>$' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><input class="form-check-input remove_charge" type="checkbox" value="" attr_seat_price="' + this.data().price + '" id="flexCheckDefault" checked></span></li>')
                //         .attr('id', 'cart-item-' + this.settings.id)
                //         .data('seatId', this.settings.id)
                //         .appendTo($cart);
                //     }else{
                        //let's create a new <li> which we'll add to the cart items
                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>₹' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                    .attr('id', 'cart-item-' + this.settings.id)
                    .data('seatId', this.settings.id)
                    .appendTo($cart);
                    // }    
                    /*
                     * Lets update the counter and total
                     *
                     * .find function will not find the current seat, because it will change its stauts only after return
                     * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                     */
                    $counter.text(sc.find('selected').length + 1);
                    $total.text(recalculateTotal(sc) + this.data().price);

                    return 'selected';

                } else if (this.status() == 'selected') {

                    //update the counter
                    $counter.text(sc.find('selected').length - 1);

                    //and total
                    $total.text(recalculateTotal(sc) - this.data().price);

                    //remove the item from our cart
                    $('#cart-item-' + this.settings.id).remove();

                    //seat has been vacated
                    return 'available';

                } else if (this.status() == 'unavailable') {
                    //seat has been already booked
                    return 'unavailable';
                } else {
                    return this.style();
                }
            },

           
        });

    //this will handle "[cancel]" link clicks
    $('#selected-seats').on('click', '.cancel-cart-item', function() {
        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
        // console.log($(this).parents('li:first').data('seatId'));
        sc.get($(this).parents('li:first').data('seatId')).click();
    });

    // $('#selected-seats').on('click', '.remove_charge', function() {
    //     //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
    //     var seat_price=$(this).attr('attr_seat_price');
    //     var window_price= $('#window_charges').val();

    //     var sid = $(this).parents('li:first').data('seatId');
    //     // console.log(sid);
    //     // var = $('#sid').
    //     sc.get($(this).parents('li:first').data('seatId'));
    // });

    //let's pretend some seats have already been booked
    // sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');
    sc.get(booked).status('unavailable');

});

function recalculateTotal(sc) {
    var total = 0;

    //basically find every selected seat and sum its price
    sc.find('selected').each(function() {

        total += this.data().price;

    });

    return total;
}

$(function() {
    $('#checkout-button').click(function() {
        var items = $('#selected-seats li')
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

// });
