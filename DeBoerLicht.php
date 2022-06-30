*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:"Poppins",sans-serif;
}


.sidebar{
  position:relative;
  overflow:hidden;
  position:fixed;
  top: 0;
  left: 0;
  height:100%;
  width:78px;
  background:#11101d;
  padding:6px 14px;
  transition: all 0.5s ease;
  float: left;
}

.topnav {
overflow: hidden;
margin: 0;
}

.sidebar.active {
  width: 240px;
}

.sidebar .logo_content .logo{
  color:#fff;
  display:flex;
  height:50px;
  width:100%;
  align-items:center;
  pointer-events: none;
}

.sidebar .logo_content .logo img {
  width: 80px;
  height: 50px;
}

.sidebar.active .logo_content .logo{
opacity: 1;
pointer-events: none;

}

.logo_content .logo i{
  font-size:28px;
  margin-right:5px;
}

.logo_content .logo .logo_name{
  font-size:20px;
  font-weight:400;
}

.logo_content i:hover{
  cursor: pointer;
}

.sidebar #btn{
  position:absolute;
  color:#fff;
  left:50%;
  top:6px;
  font-size:20px;
  height:50px;
  width:50px;
  text-align:center;
  line-height:50px;
  transform:translateX(-50%);
}

.sidebar.active #btn{
  left: 90%;
}

.nav_list{
  margin-top: 10px;
}

.sidebar ul li{
  position: relative;
  height: 50px;
  width: 100%;
  list-style: none;
  line-height: 50px;
  color: white;
}

.sidebar ul li input{
  position: absolute;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
  border-radius: 12px;
  outline: none;
  border: none;
  background: #1d1b31;
  padding-left: 50px;
  font-size: 18px;
  color: #fff;
}

.sidebar ul li a{
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  border-radius: 12px;
  color: #fff;
  white-space: nowrap;
}

.sidebar ul li a:hover{
  background: rgb(68, 15, 175);
}

.sidebar ul li i{
  height:50px;
  min-width:50px;
  border-radius:12px;
  line-height:50px;
  text-align:center;
}

.sidebar .links-name{
  opacity: 0;
  pointer-events: none;
}

.text {
  background-color: yellow;
  color: rgb(65, 65, 65);
  width: 250px;
  font-weight: bold;
  font-size: 20px;
  border:none;
  text-align: center;
}

.sidebar.active .links-name{
  opacity: 1;
  pointer-events: auto;
  font-family: "Raleway", sans-serif;
  font-size: 20px;
}

.login {
  position: absolute;
  bottom: 10px;
  left: 10px;
  width: 70%;
  opacity: 0;
  pointer-events: none;
}

.sidebar.active .login{
  opacity: 1;
  pointer-events: auto;
  width: 90%;
  pointer-events: all;
}

.logout{
  position: absolute;
  bottom: 10px;
  left: 10px;
  width: 70%;
}

.container{
  height: 100vh;
  max-width: 100vw;
  display: grid;
  grid-template-columns: 78px 1fr;
  grid-template-rows: 1fr;
  grid-auto-flow: row;
}

.sidebar-left{
  grid-area: 1 / 1 / 1 / 2;
}

.product-container{
  grid-area: 1 / 2 / 1 / 2;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 300px;
  gap: 20px 30px;
  padding: 40px 50px;
  max-width: 100vw;
}

.product{
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr;
  max-height: 300px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  color: #11101d;
  
}

.product-links{
  display: flex;
  justify-content: center;
  align-items: center;
}

.slider{
  grid-area: 1 / 1 / 1 / 2;
  height: 300px;
  width: 100%;
  overflow: hidden;
  position: relative;
}

.slides{
  width: 300%;
  height: 100%;
  display: flex;
}

.slides input{
  display: none;
}

.slide{
  width: calc(100% / 3);
  transition: 2s;
}

.slide img{
  width: 100%;
  height: 300px;
  object-fit: cover;
  object-position: center;
}

.navigation-manual{
  position: absolute;
  margin-top: -35px;
  width: 100%;
  display: flex;
  justify-content: center; 
}

.manual-btn{
  border: 2px solid #40D3DC;
  padding: 5px;
  border-radius: 50%;
  cursor: pointer;
  transition: 1s;
}

.manual-btn:not(:last-child){
  margin-right: 20px;
}

.manual-btn:hover{
  background-color: #40D3DC;
}

#:checked ~ .first{
  margin-left: 0;
}

#radio2:checked ~ .first{
  margin-left: calc(-100% / 3);
}

.product-rechts{
  grid-area: 1 / 2 / 1 / 2;
  padding: 10px 20px;
  display: grid;
  grid-template-rows: auto auto auto auto auto;
  position: relative;
  height: 100%;
}

.ribbon{
  position: absolute;
  width: 80px;
  height: 20px;
  background: rgb(232, 0, 0);
  top: 60px;
  right: -6px;
  text-align: center;
  color: white;
  display: flex;
  justify-content: center;
}

.ribbon p{
  position: absolute;
  top: -1.5px;
}

.ribbon::before{
  content: "";
  position: absolute;
  top: -6px;
  right: 0;
  border-left: 3px solid rgb(157, 0, 0);
  border-right: 3px solid transparent;
  border-top: 3px solid transparent;
  border-bottom: 3px solid rgb(157, 0, 0);
}
.ribbon::after{
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border-left: 10px solid #fff;
  border-right: 10px solid transparent;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}

.product h2{
  font-family: "Raleway", sans-serif;
}

.product p{
  font-family: "Raleway", sans-serif;
}

.product-naam{
  text-align: center;
  font-size: 40px;
  padding-bottom: 5px;
}

.product-info{
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  padding-top: 10px;
}

.product-info p{
  padding: 3px 0;
}

.voorraad{
  display: flex;
  align-items: center;
}

.op-voorraad{
  color: green;
}

.product-voorraad{
  color: red;
}

.geen-voorraad{
  color: red;
}

.korting-prijs{
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
}

.discount{
  color: lightgrey;
}

.product-prijs{
  display: flex;
  align-items: center;
  padding: 10px 0;
}

.voeg-toe{
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-template-rows: 1fr;
  gap: 0 10px;
  align-items: center;
}

.voeg-toe-button{
  grid-area: 1 / 1 / 1 / 1;
  margin-right: 20px;
  border: solid 2px #11101d;
  background-color: #11101d;
  color: white;
  border-radius: 12px;
  font-family: "Raleway", sans-serif;
  font-size: 18px;
  padding: 2px 5px;
  height: 40px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
}

.voeg-toe-button:hover{
  background-color: rgb(68, 15, 175);
  border-color: rgb(68, 15, 175);
  cursor: pointer;
  transition: .5s ease;
}

.aantal-input{
  grid-area: 1 / 2 / 1 / 2;
  width: 50px;
  height: 40px;
  text-align: center;
  border-radius: 12px;
  border: solid 2px #11101d
}

.sorteren{
  z-index: 1;
  position: fixed;
  bottom: 20px;
  right: 20px;
}

.dropup{
  position: relative;
  display: inline-block;
}

.dropup:hover .dropup-content{
  visibility: visible;
  opacity: 1;
}

.sort-optie{
  background-color: #11101d;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  padding: 10px 20px;
  text-decoration: none;
  font-family: "Raleway", sans-serif;
  color: white;
}

.top{
  border-radius: 12px 12px 0 0;
}

.bottom{
  border-radius: 0 0 12px 12px;
}

.sort-optie:hover{
  background-color: rgb(68, 15, 175);
  transition: .3s ease;
}

.hoogste-korting{
  padding-bottom: 10px;
  background-color: #11101d;
}

.dropup-content{
  visibility: hidden;
  opacity: 0;
  transition: .5s ease;
  position: absolute;
  z-index: 1;
  bottom: 50px;
  right: 0px;
  width: 100px;
  margin-bottom: 10px;
  display: grid;
  grid-template-rows: 1fr 1fr 1fr;
  min-width: 180px;
}

.dropbtn{
  font-size: 25px;
  border: none;
  background-color: #11101d;
  color: white;
  border-radius: 50%;
  height: 50px;
  width: 50px;
  margin-top: 10px;
} 

.add-btn{
  position: fixed;
  bottom: 20px;
  right: 85px;
  z-index: 1;
}

.add-btn button{
  font-size: 25px;
  border: none;
  background-color: #11101d;
  color: white;
  border-radius: 50%;
  height: 50px;
  width: 50px;
}

.add-btn button:hover{
  background-color: rgb(68, 15, 175);
  transition: .5s ease;
  cursor: pointer;
}

.categorie_add{
  right: 20px;
}

.besteloz-container {
  margin-top: 30px;
  display: flex;
  justify-content: center;
  grid-area: 1 / 2 / 1 / 2;
}

table {
  border-collapse: collapse;
  display: flex;
}

.besteloz-tabel td,.besteloz-tabel th{
  padding:12px 15px;
  border:2px solid #11101d;
  text-align: center;
  }
  
.besteloz-tabel th {
  background-color: #ddd;
}

.bestel_product{
  display: grid;
  grid-template-columns: auto auto;
}

#goedkeuren-btn {
  background-color: rgb(211, 211, 211);
  color: green;
  border-radius: 5px;
  font-weight: bold ;
  padding: 2px;
}

#annuleren-btn {
  background-color: rgb(211, 211, 211);
  color: red;
  border-radius: 5px;
  font-weight: bold ;
  padding: 2px;
}
  
.categorie-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  padding: 50px;
  gap: 20px 30px
}

.categorie-link{
  height: 300px;
}

.categorie{
  height: 300px;
  max-height: 300px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 300px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.categorie-foto{
  height: 300px;
  width: 100%;
  object-fit: cover;
  object-position: center;
  text-decoration: none;
}

.categorie-links{
  grid-area: 1 / 1 / 2 / 2;
  position: relative;
  text-align: center;
}

.categorie-rechts{
  grid-area: 1 / 2 / 2 / 3;
  gap: 5px;
  padding: 10px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
}

.korting-product{
  position: relative;
}

.cat-ribbon{
  position: absolute;
  width: 40px;
  height: 15px;
  background: rgb(232, 0, 0);
  top: 6px;
  right: -4px;
  color: white;
}

.cat-ribbon p{
  position: absolute;
  top: -1.5px;
  font-family: "Raleway", sans-serif;
  font-size: 12px;
  top: 0.3px;
}

.cat-ribbon::before{
  content: "";
  position: absolute;
  top: -4px;
  right: 0;
  border-left: 2px solid rgb(157, 0, 0);
  border-right: 2px solid transparent;
  border-top: 2px solid transparent;
  border-bottom: 2px solid rgb(157, 0, 0);
}
.cat-ribbon::after{
  content: "";
  position: absolute;
  top: 0;
  left: -15px;
  border-left: 7.5px solid transparent;
  border-right: 7.5px solid rgb(232, 0, 0);
  border-top: 7.5px solid rgb(232, 0, 0);
  border-bottom: 7.5px solid rgb(232, 0, 0);
}

.catpro-foto{
  text-decoration: none;
  object-fit: cover;
  object-position: center;
  height: 100%;
  width: 100%;
  position: relative;
}

.categorie-container a{
  text-decoration: none;
}

.categorie-naam{
  text-align: center;
  font-size: 20px;
  position: absolute;
  width: 100%;
  background-color: rgba(0,0,0,0.4);
  color: white;
  padding: 8px 0;
  top: 0;
  backdrop-filter: blur(1px);
}

.categorie-naam h2{
  font-family: "Raleway", sans-serif;
  font-weight: 600;
}

.cart-container{
  display: grid;
  grid-template-columns: 5fr 2fr;
  grid-template-rows: 1fr;
  grid-auto-flow: row;
}

.cart{
  grid-area: 1 / 1 / 1 / 1;
  display: grid;
  grid-template-rows: 60px auto;
  padding: 0 50px;
}

.total{
  background-color: #11101d;
  grid-area: 1 / 2 / 1 / 2;
  display: grid;
  grid-template-rows: 60px auto;
  position: sticky;
  height: 100vh;
  box-sizing: border-box;
  top: 0;
}

.uw-winkelmandje{
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Raleway", sans-serif;
  font-size: 20px;
  color: #11101d;
}

.uw-winklemandje h1{
  color: #11101d
}

.totaalprijs{
  color: white;
  font-family: "Raleway", sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
}

.cart-product{
  grid-area: 2 / 1 / 2 / 1;
  padding: 20px 0;
}

.geen-items{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.geen-items p{
  font-family: "Raleway", sans-serif;
  color: lightgrey;
  font-style: italic;
  letter-spacing: 2px;
}

.in-cart-product{
  display: grid;
  grid-template-columns: 170px auto;
  border-radius: 12px;
  height: 170px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  padding: 5px;
  margin-bottom: 10px;
}

.cart-foto{
  width: 160px;
  height: 160px;
  object-fit: cover;
  object-position: center;
  border-radius: 12px;
}

.in-cart-right{
  display: grid;
  grid-template-columns: 3fr 1fr;
  margin-left: 30px;
}

.in-cart-right h2{
  font-family: "Raleway", sans-serif;
}

.in-cart-right p{
  font-family: "Raleway", sans-serif;
}

.right-main{
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr 2fr 1fr;
}

.in-cart-naam{
  grid-area: 1 / 1 / 2 / 3;
  font-size: 20px;
}

.right-info{
 grid-area: 2 / 1 / 2 / 2;
 display: grid;
 grid-template-columns: 1fr 1fr;
 grid-template-rows: 1fr 1fr 1fr; 
}

.right-info-text{
  display: flex;
  align-items: center;
  color: #11101d;
}

.right-info-voorraad{
  display: flex;
  align-items: center;
  grid-area: 3 / 1 / 4 / 2;
}

.right-price{
  display: grid;
  grid-template-rows: 2fr 1fr;
  position: relative;
}

.price{
  display: flex;
  justify-content: center;
  margin-bottom: 5px;
  align-items: flex-end;
  color: #11101d;
  text-align: center;
}


.cart-ribbon{
  position: absolute;
  width: 80px;
  height: 20px;
  background: rgb(232, 0, 0);
  top: 12px;
  right: -12px;
  text-align: center;
  color: white;
  display: flex;
  justify-content: center;
}

.cart-ribbon p{
  position: absolute;
  top: -1.5px;
}

.cart-ribbon::before{
  content: "";
  position: absolute;
  top: -6px;
  right: 0;
  border-left: 3px solid rgb(157, 0, 0);
  border-right: 3px solid transparent;
  border-top: 3px solid transparent;
  border-bottom: 3px solid rgb(157, 0, 0);
}
.cart-ribbon::after{
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border-left: 10px solid #fff;
  border-right: 10px solid transparent;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}


.hoeveelheid{
  display: flex;
  justify-content: center;
  align-items: center;
}

.cart-aantal{
  height: 40px;
  width: 50px;
  margin-right: 5px;
  text-align: center;
  border-radius: 12px;
  border: solid 2px #11101d
}

.delete-btn{
  border: none;
  text-decoration: none;
  background-color: #11101d;
  cursor: pointer;
  margin-left: 5px;
  height: 40px;
  width: 40px;
  border-radius: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.delete-btn:hover{
  background-color: rgb(68, 15, 175);
  transition: .5s ease;
}

.delete-btn i{
  color: white;
  font-size: 15px;
}

.prijzen{
  padding: 20px 30px;
}

.prijzen p{
  font-family: "Raleway", sans-serif;
  font-size: 20px;
}

.prijs-item{
  color: white;
  display: grid;
  grid-template-columns: 3fr auto auto;
  gap: 0 10px;
}

.aligned-right{
  display: flex;
  justify-content: flex-end;
}

.streep{
  display: grid;
  grid-template-columns: 1fr auto;
  align-items: center;
  padding: 7px 0;
}

.streep-links{
  background-color: white;
  height: 4px;
  border-radius: 1.5px;
  margin-right: 5px;
}

.streep-rechts{
  color: white;
  padding-left: 5px;
  font-size: 20px;
}

.totaal-display{
  display: grid;
  grid-template-columns: 1fr 1fr;
}

.totaal-links{
  color: white;
  font-weight: 600;
}

.totaal-rechts{
  color: white;
  text-align: right;
  font-weight: 600;
}

.afreken_btn button{
  width: 100%;
  margin-top: 15px;
  padding: 8px 0;
  font-size: 20px;
  border-radius: 12px;
  color: #11101d;
  background-color: white;
  border: 2px solid white;
  font-family: "Raleway", sans-serif;
  font-weight: 900;
  text-decoration: none;
}

.afreken_btn button:hover{
  background-color: rgb(68, 15, 175);
  border-color: rgb(68, 15, 175);
  color: white;
  cursor: pointer;
  transition: .5s ease;
  font-weight: 500;
}

.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}


.geen-producten{
position: absolute;
margin-left: 150px;
margin-top: 250px;

}


.categorie1-foto{
  height: 50px;
}

.toevoegen
{
  display: flex;
  justify-content: center;  
}

.toevoegen .input {
  border: 1px solid rgb(13, 13, 13);
  color: #000000;
  background-color: #d9d9d9;
  padding: 15px;
  width: 100%;
  border-radius: 5px;
  font-size: 15px;
  text-align: center;
  margin: 3px;
}

.toevoegen .input:hover {
  background-color: #c1c1c1;
  color: #000000;
  border: 1px solid rgb(13, 13, 13);
}

.toevoegen-btn {
  font-family: 'Poppins', sans-serif;
  display: inline-block;
  background-color: #F28123;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  background-color: #000000;
  color: #ffffff;
  margin-left: 32.5%;
}

.toevoegen-btn:hover {
  background-color: #ffffff;
  color: #000000;
}

.categoriebeheer-container {
  grid-area: 1 / 2 / 1 / 2;
  display: flex;
  justify-content: center ;
  margin-top: 20px;
}
  
.betaal-container{
  top: 0;
  left: 0;
  height: 100vh;
  width: 100vw;
  position: fixed;
  background-color: rgba(0, 0, 0, 0.25);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  pointer-events: none;
}
.betaal-container.show{
  pointer-events  : auto;
  opacity: 1;
}

.betaal-modal{
  background-color: white;
  width: 800px;
}

.betaal-form {
  display: flex;
  justify-content: center; 
  width: 100%;
  position: relative;
  padding: 20px;
}

.close_btn{
  position: absolute;
  top: 10px;
  right: 10px;
}

.bf {
  border: 1px solid rgb(13, 13, 13);
  color: #051922;
  background-color: #d9d9d9;
  padding: 15px;
  width: 100%;
  border-radius: 5px;
  font-size: 15px;
  text-align: center;
  margin: 3px;
}

.bf:hover {
  background-color: #c1c1c1;
  color: #ddd;
}

.bestel-btn {
  font-family: 'Poppins', sans-serif;
  display: inline-block;
  background-color: #F28123;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  margin-left: 44.8% ;
  margin-right: 44.8%;
  background-color: #000000;
  color: #ffffff;
}

.bestel-btn:hover {
  background-color: #ffffff;
  color: #000000;
}

