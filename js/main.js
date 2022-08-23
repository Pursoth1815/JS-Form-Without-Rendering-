
let formName = document.forms.personal;

let formNameEdit = document.forms.personalEdit;

let message = document.querySelector(".msg");

let trData = document.getElementById("tablebody");

let updateData = document.getElementById('updateData');

let insertData = document.getElementById('insertData');

// Get Gender from Form parent

let genderEl = formName.elements.gender;


// Convert Nodelist into array

let allGender = [...genderEl];

// allGender[0].removeAttribute("checked");

let fullname = formName.elements.firstName;

let num = formName.elements.number;

let pincode = formName.elements.pincode;

let email = formName.elements.email;

let address = formName.elements.address;

// Validation Requirements

const pat1 = /^\d{6}$/;

const pat2=/^\d{10}$/;

let formIsValid = false;

// Update Requirements 

let editname = document.getElementById('editFirstName');

let editEmail = document.getElementById('editEmail');

let editNumber = document.getElementById('editNumber');

let editID = document.getElementById('editID');



/* Validation Process */

const verfication = () => {

    if (fullname.value == false) {

        alert('Please Enter Name');

    } else if(allGender[0].checked == false && allGender[1].checked == false) {

        alert('Please Select Gender');

    } else if(!pat2.test(num.value)) {
        
        alert('Number must in 10 digits'); 
        
    } else if (num.value == false) {

        alert('Please Enter Number');
        
    } else if (pincode.value == false) {

        alert('Please Enter Pin Code');

    } else if(!pat1.test(pincode.value)) {

        alert('Pincode must be number of 6 digits');

    } else if (address.value == false) {

        alert('Please Enter Address');

    } else {

        formIsValid = true;
        
    }

    return formIsValid;

}


/* Send Data to Database */

async function gettingResponse(jsonData) {

    const url = 'DBconnection/insert.php';

    const response = await fetch( url , {
        method:'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: jsonData,
    })
    const data = await response.json();

    if(data) {
        // console.log(data);
       
        responseMessage(data);
       
    }
    else{
        console.log('some');
    }


}


/* Handle Submit Event */

const handleSubmit = (event) => {

    event.preventDefault();

    verfication();
    
    if(formIsValid) {
        
        const formData = new FormData(formName); //
    
        const jsonData = JSON.stringify(Object.fromEntries(formData)); // Object Foramtes

        formData.delete("id");

        // console.log('Kaviya data',typeof formData);

        // console.log('Kaviya data',[...formData]);

        // const data = new URLSearchParams(formData).toString(); //GET formate  OR  BELOW 

        gettingResponse(jsonData);

        console.log(jsonData);
            
        // console.log(data);
            
        // console.log([...formData.entries()]);

        }

};

/* Fetch Table Data */


const fetchData =  () => {

    fetched_Data();

    async function fetched_Data() {

        const fetchDatas = await fetch('DBconnection/fetchData.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        const res = await fetchDatas.json();
        
        // console.log(res);
        let html = '';

        for( let i of res) {
            
            // console.log(i.Name);
            html += 
            `<tr>
                <th scope='row'>${i.ID}</th> 
                <td>${i.Name}</td> 
                <td>${i.Mobile}</td> 
                <td>${i.EMail}</td>
                <td><a href="">Edit</a></td>
                <td><a href="">Delete</a></td>
            </tr>`; 
            
        }
        trData.innerHTML =  html;
        
    }

}

/* Fetch Table Data for Edit and Delete */

trData.addEventListener('click', (event) => {
    
    event.preventDefault();
    
    let target = event.target;

    let closestTr = target.closest("tr");

    if(target.tagName === 'A') {
        
        let commonID = closestTr.children[0].textContent;

        if(target.textContent === 'Edit') {

            insertData.setAttribute('class', 'input-container nullData');
            updateData.setAttribute('class',  'input-container');

            let nameEdit = closestTr.children[1].textContent;
            let numEdit = closestTr.children[2].textContent;
            let mailEdit = closestTr.children[3].textContent;
            let idEdit = closestTr.children[0].textContent;

            editID.value = idEdit;
            editname.value = nameEdit;
            editEmail.value = mailEdit;
            editNumber.value = numEdit;

            window.scrollTo(0,0);

        }

        else if(target.textContent === 'Delete') {

            deleteData(commonID);
        }

    }

    else {

        return ;

    }


})

/* Delete Table Data */

const deleteData = (givenID) => {

    delete_Data();

    async function delete_Data() {

        const deleteDatas = await fetch('DBconnection/delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: givenID,
        })
        const res = await deleteDatas.json();

        responseMessage(res);
        
    }

}

/* Print Message Function */

function responseMessage(data) {

    message.innerHTML = data;
        
    fetchData();
    
    formName.reset();

    window.scrollTo(0, 0);

    setTimeout( () => {

        message.innerHTML = null;

    } ,3000)

}

/* handel Edit Submit */


const handleEditSubmit = (event) => {

    event.preventDefault();

    const formDataEdit = new FormData(formNameEdit); //
    
    const jsonData = JSON.stringify(Object.fromEntries(formDataEdit)); // Object Foramtes

    gettingEditedResponse(jsonData);

    // console.log(jsonData);

}

/* Edit Data to Database */

async function gettingEditedResponse(jsonData) {

    const url = 'DBconnection/update.php';

    const response = await fetch( url , {
        method:'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: jsonData,
    })
    const data = await response.json();

    if(data) {
        // console.log(data);
        insertData.setAttribute('class', 'input-container');
        updateData.setAttribute('class',  'input-container nullData');
       
        responseMessage(data);
       
    }
    else{
        console.log('some');
    }


}




document.addEventListener('DOMContentLoaded', fetchData);

formName.addEventListener('submit', handleSubmit);

formNameEdit.addEventListener('submit', handleEditSubmit);
