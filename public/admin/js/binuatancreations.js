//------------------SWEET ALERT-------------------\\

//DELETE 
window.addEventListener('deleteModal', event =>{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteConfirmed');
        }
    })
});
 
//DELETE SUCCESS
window.addEventListener('successDelete', event => {
    Swal.fire(
        'Deleted!',
        event.detail.message,
        'success'
    )
});

//SUCCESS
window.addEventListener('successAlert', event => {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title:  event.detail.message,
        showConfirmButton: false,
        timer: 1500
    })
});

//SHOW IMAGE
window.addEventListener('showImage', event=>{
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        imageUrl: event.detail.image,
        imageAlt: 'Custom image',
    })
});
//------------------SWEET ALERT-------------------//



//------------------MODAL SECTION-------------------\\

//OPEN CATEGORY
window.addEventListener('closeModalCategory', event => {
    $("#modalCategory").modal('hide');
})

//CLOSE CATEGORY
window.addEventListener('openModalCategory', event => {
    $("#modalCategory").modal('show');
})


//OPEN COLOR
window.addEventListener('closeModalColor', event => {
    $("#modalColor").modal('hide');
})

//CLOSE COLOR
window.addEventListener('openModalColor', event => {
    $("#modalColor").modal('show');
})

//OPEN SIZE
window.addEventListener('closeModalSize', event => {
    $("#modalSize").modal('hide');
})

//CLOSE SIZE
window.addEventListener('openModalSize', event => {
    $("#modalSize").modal('show');
})

//OPEN DISCOUNT
window.addEventListener('closeModalDiscount', event => {
    $("#modalDiscount").modal('hide');
})

//CLOSE DISCOUNT
window.addEventListener('openModalDiscount', event => {
    $("#modalDiscount").modal('show');
})


//OPEN COUPON
window.addEventListener('closeModalCoupon', event => {
    $("#modalCoupon").modal('hide');
})

//CLOSE COUPON
window.addEventListener('openModalCoupon', event => {
    $("#modalCoupon").modal('show');
})
//------------------MODAL SECTION-------------------//




//------------------FLASH MESSAGE SECTION------------\\

setTimeout(function(){
    $('#successMessage').fadeOut('slow');
},10000);


