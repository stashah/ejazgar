<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: -5px;
  left: 105%;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
  <div
  style="
  width: min-content;
    height: auto;
    position: fixed;
    top: 60%;
    right:0%;
    display: block;
    z-index: 5;">
    <div >
      <a class="btn btn-primary btn-sm btn-rounded btn-icon"  width="100%" href="../purchase/">Purc</a>
      <br><br>
      <a class="btn btn-primary btn-rounded btn-sm btn-icon " width="100%" href="../sale/">Sale</a>
      <br><br>
      <a class="btn btn-primary btn-rounded btn-sm btn-icon " width="100%" href="../product/">Prod</a> 
    </div>
  </div>
