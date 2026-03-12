let rollInput = document.getElementById("roll")
let nameInput = document.getElementById("name")
let addBtn = document.getElementById("addBtn")
let list = document.getElementById("studentList")
let totalText = document.getElementById("total")
let attendanceText = document.getElementById("attendance")
let searchInput = document.getElementById("search")
 
let editItem = null
 
nameInput.addEventListener("input",function(){
    addBtn.disabled = nameInput.value.trim() === ""
})
 
addBtn.addEventListener("click",function(){
 
    let roll = rollInput.value.trim()
    let name = nameInput.value.trim()
 
    if(editItem){
        editItem.querySelector(".text").innerText = roll + " - " + name
        editItem = null
    }else{
 
        let li = document.createElement("li")
 
        let span = document.createElement("span")
        span.className="text"
        span.innerText = roll + " - " + name
 
        let present = document.createElement("input")
        present.type="checkbox"
 
        present.addEventListener("change",function(){
            li.classList.toggle("present")
            updateAttendance()
        })
 
        let editBtn = document.createElement("button")
        editBtn.innerText="Edit"
 
        editBtn.onclick=function(){
            let parts = span.innerText.split(" - ")
            rollInput.value = parts[0]
            nameInput.value = parts[1]
            editItem = li
        }
 
        let delBtn = document.createElement("button")
        delBtn.innerText="Delete"
 
        delBtn.onclick=function(){
            if(confirm("Are you sure you want to delete this student?")){
                li.remove()
                updateTotal()
                updateAttendance()
            }
        }
 
        li.appendChild(span)
        li.appendChild(present)
        li.appendChild(editBtn)
        li.appendChild(delBtn)
 
        list.appendChild(li)
    }
 
    rollInput.value=""
    nameInput.value=""
    addBtn.disabled=true
 
    updateTotal()
    updateAttendance()
})
 
function updateTotal(){
    totalText.innerText = "Total students: " + list.children.length
}
 
function updateAttendance(){
 
    let present = document.querySelectorAll(".present").length
    let total = list.children.length
    let absent = total - present
 
    attendanceText.innerText = "Present: " + present + " , Absent: " + absent
}
 
searchInput.addEventListener("input",function(){
 
    let value = searchInput.value.toLowerCase()
 
    let items = list.getElementsByTagName("li")
 
    for(let i=0;i<items.length;i++){
 
        let text = items[i].querySelector(".text").innerText.toLowerCase()
 
        if(text.includes(value)){
            items[i].style.display="flex"
        }else{
            items[i].style.display="none"
        }
 
    }
 
})
 
function sortStudents(){
    let items = Array.from(list.children);
 
    items.sort(function(a,b){
        let nameA = a.querySelector(".text").innerText.split(" - ")[1].toLowerCase();
        let nameB = b.querySelector(".text").innerText.split(" - ")[1].toLowerCase();
 
        return nameA.localeCompare(nameB);
    });
 
    items.forEach(function(item){
        list.appendChild(item);
    });
}
 
function highlightFirst(){
 
    let items = list.children
 
    for(let i=0;i<items.length;i++){
        items[i].classList.remove("highlight")
    }
 
    if(items.length>0){
        items[0].classList.add("highlight")
    }
 
}