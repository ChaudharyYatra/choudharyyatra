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
var abc=['x','z'];
for(var i=0;i<first_cls_cnt; i++)
{
    var new_i=i+2;

    abc.splice(new_i, new_i,'f');    
}
 console.log(first_cls_cnt);

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


// var xyz=[];
// for(var j=0;j<second_cls_cnt; j++)
// {
//     xyz.splice(j, j,'s');    
// }

// var myString_second = "";
// for (var i = 0; i < xyz.length; i++) {

//     myString_second += xyz[i];
//     if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0) {
//         myString_second += "_";
//     }
//     var ooo=xyz.length-1;
//     if ((i + 1) % 4 === 0) {
//         myString_second = myString_second.substring(0, myString_second.length-1);
//         myString_second += "b,";
//     }else if((i + 1) % 4 === 1 && i!=0)
//     {
//         myString_second = myString_second.substring(0, myString_second.length-1);
//         myString_second += "b";
//     }else if(i==0)
//     {
//         myString_second = myString_second.substring(0, myString_second.length-1);
//         myString_second += "b";
//     }
// }
// console.log(myString_second);


// var pqr=[];
// for(var k=0;k<economy_cls_cnt; k++)
// {
//     pqr.splice(k, k,'e');    
// }

// var myString_economy = "";
// for (var i = 0; i < pqr.length; i++) {

//     myString_economy += pqr[i];

// var remain= pqr.length-i;
//     if ((i + 1) % 2 === 0 && (i + 1) % 4 != 0 && remain>5) {
//         myString_economy += "_";
//     }
//     var ooo=pqr.length-1;
//     if ((i + 1) % 4 === 0 && remain>2) {
//         myString_economy = myString_economy.substring(0, myString_economy.length-1);
//         myString_economy += "c,";
//     }else if((i + 1) % 4 === 1 && i!=0)
//     {
//         myString_economy = myString_economy.substring(0, myString_economy.length-1);
//         myString_economy += "c";
//     }else if(i==0)
//     {
//         myString_economy = myString_economy.substring(0, myString_economy.length-1);
//         myString_economy += "c";
//     }
// }

// console.log(myString_economy);
var numbersArray = myString.split(',');
// var numbersArray_second = myString_second.split(',');
// var numbersArray_economy = myString_economy.split(',');

// var array_final = numbersArray.concat(numbersArray_second, numbersArray_economy);
var final_filtered = numbersArray.filter(elm => elm);
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
                // console.log(this.settings);
                // console.log(this.data());
            //  selection_array.push(this.settings.id); 
                //  console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
                 //console.log(selection_array);


                if (this.status() == 'available') {
                    // if(this.data().category=='Window Class'){
                    // //let's create a new <li> which we'll add to the cart items
                    // $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>$' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><input class="form-check-input remove_charge" type="checkbox" value="" attr_seat_price="' + this.data().price + '" id="flexCheckDefault" checked></span></li>')
                    //     .attr('id', 'cart-item-' + this.settings.id)
                    //     .data('seatId', this.settings.id)
                    //     .appendTo($cart);
                    // }else{
                        //let's create a new <li> which we'll add to the cart items
                    $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ': <b>$' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
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
        // console.log(sc);

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
