
const submitBTN = document.getElementById('submit');
const cautraloi = document.querySelectorAll('.cautraloi');

let cauhoi_hientai = 0;
let socaudung = 0;

const data_cauhoi = "";

load_question();

function load_question(){

    remove_answer()
    
    fetch('http://localhost/RestFullAPI_App/API/Question/read.php')
    .then(res=>res.json())
    .then(data=>{
        //console.log(data)
        const cauhoi = document.getElementById('title');
        

        const a_cautraloi = document.getElementById('a_cautraloi');
        const b_cautraloi = document.getElementById('b_cautraloi');
        const c_cautraloi = document.getElementById('c_cautraloi');
        const d_cautraloi = document.getElementById('d_cautraloi');


        //hien thi cau hoi va cau tra loi
        const get_cauhoi = data.data[cauhoi_hientai];


        console.log(get_cauhoi)
        cauhoi.innerText = get_cauhoi.title;
        a_cautraloi.innerText = get_cauhoi.option_a;
        b_cautraloi.innerText = get_cauhoi.option_b;
    
        if(get_cauhoi.option_c != null){
            c_cautraloi.innerText = get_cauhoi.option_c;
        }else{
            document.getElementById('.cau_c').classList.add('hienthicautraloi');
        }
    
        if(get_cauhoi.option_d != null){
            d_cautraloi.innerText = get_cauhoi.option_d;
        }else{
            document.getElementById('.cau_d').classList.add('hienthicautraloi');
        }
        
        document.getElementById('caudung').value = get_cauhoi.right_answer;

    })
    .catch(error=>console.log(error));

}

//choose answer
function get_answer(){
    let answer = undefined;
    cautraloi.forEach((cautraloi)=>{
        if(cautraloi.checked){
            answer = cautraloi.id;
        }
    })
    return answer;
}

//remove choosing answer
function remove_answer(){
    cautraloi.forEach((cautraloi)=>{
        cautraloi.checked = false;
    })
}

//submit event
submitBTN.addEventListener("click", function(){
    const answer = get_answer();
    if(answer){
        if(answer === document.getElementById('caudung').value){
            socaudung++;
            console.log(socaudung);
        }
    }

    cauhoi_hientai++;
    load_question();

    if(cauhoi_hientai< data_cauhoi.length){
        load_question();
    }else{
        //Summary
    }
})