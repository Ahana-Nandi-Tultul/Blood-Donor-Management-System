



document.querySelectorAll('.accept').forEach(item=>{
    item.addEventListener('click',function(e) {
        let r_no=document.getElementById(item.id).id;
        let user_type=document.getElementById(item.id).parentElement.previousElementSibling.id
        console.log(r_no);
        console.log(user_type)
        //console.log('hi');
        confirm_Acceptfun(r_no, user_type);
    })})
    

        function confirm_Acceptfun(r_no, user_type ){
            data1={'r_no': r_no, 'userType':user_type };
            let ts=JSON.stringify(data1);
            console.log(ts);
            $.ajax({
            type:"POST",
            url: "../partials/modal/_handleBloodRequestAcceptConfirmModal.php",
            data: ts,
            ContentType:"application/json",

            success:function(data){
               alert('successfully posted');
               console.log(data);
            },
            error:function(error){
            console.log(error)
                alert('Could not be posted');
            }

         });
        }
        let user=document.getElementById('usertype');
        console.log(user);
        let user_type=user.nextElementSibling.getAttribute('id');
        console.log(user_type);
        let update_phn_no=document.getElementById('update_phn_no');
        let phn_no=update_phn_no.getAttribute('value');
        let update_address= document.getElementById('update_address');
        let address = update_address.getAttribute('value');

        let h4_edit_profile=document.getElementById('edit_profile');


        let div_id_edit_profile=h4_edit_profile.nextElementSibling.getAttribute('id');
       
        //console.log(div_id_edit_profile);
        
        let privious_address=document.getElementById('privious_address').innerText;
        //console.log(privious_address);
        
        let privious_phn_no=document.getElementById('privious_phn_no').innerText;
        //console.log(privious_phn_no);

        let update_city=document.getElementById('update_city');
        let city=update_city.options[update_city.selectedIndex].value;
        //console.log(city);
        update_profile={'usertype':user_type, 'no':div_id_edit_profile, 'phn_no':phn_no, 'address':address, 'city':city, 'privious_address':"0", 'privious_phn_no':"0" };
        let update_profile_localStorage_data=JSON.parse(localStorage.getItem("update_profile"));;
        if(update_profile_localStorage_data!=null){
            update_profile_localStorage_data.push(update_profile);
        }
        else{
            update_profile_localStorage_data=[];
            update_profile_localStorage_data.push(update_profile);
        }
        //console.log(update_profile_localStorage_data)

localStorage.setItem("update_profile", JSON.stringify(update_profile_localStorage_data))
let update_phn_no_button=document.getElementById('update_phn_no_button');
update_phn_no_button.addEventListener('click', (e)=>{
    update_profile_localStorage_data[0]['phn_no']=update_phn_no.value;
    update_profile_localStorage_data[0]['privious_phn_no']=privious_phn_no;
    console.log(update_profile_localStorage_data[0]['privious_phn_no']);
    localStorage.setItem("update_profile", JSON.stringify(update_profile_localStorage_data))
    //console.log(update_date.innerText);
});
let update_time_button=document.getElementById('update_address_button');
update_time_button.addEventListener('click', (e)=>{
    update_profile_localStorage_data[0]['address']=update_address.value;
    update_profile_localStorage_data[0]['privious_address']=privious_address;
    console.log(update_profile_localStorage_data[0]['privious_address']);
    localStorage.setItem("update_profile", JSON.stringify(update_profile_localStorage_data))
    //console.log(update_date.innerText);
});
let update_city_button=document.getElementById('update_city_button');
update_city_button.addEventListener('click', (e)=>{
    update_profile_localStorage_data[0]['city']=update_city.options[update_city.selectedIndex].value;
    console.log(update_profile_localStorage_data[0]['city']);
    localStorage.setItem("update_profile", JSON.stringify(update_profile_localStorage_data))
    //console.log(update_date.innerText);
});

let profile_update_save_button= document.getElementById('profile_update_save_button');
profile_update_save_button.addEventListener('click', (e)=>{
    update_profile_localStorage_data=[];
    update_profile_localStorage_data=JSON.parse(localStorage.getItem("update_profile"));
  console.log(JSON.stringify(update_profile_localStorage_data));
  let ts=JSON.stringify(update_profile_localStorage_data);
  // http://localhost/Aparler/partials/update_appoinments/_update_apoinments.php
  $.ajax({
    type:"POST",
    url: "../partials/_editProfile.php",
    data: ts,
    ContentType:"application/json",

    success:function(data){
        //alert('successfully posted');
        //console.log(data);
       localStorage.clear();
    },
    error:function(error){
      // console.log(error)
     // alert('Could not be posted');
      localStorage.clear();
    }

});
});


