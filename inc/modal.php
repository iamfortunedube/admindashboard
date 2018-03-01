<style >
    #overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 1;
    cursor: pointer;
    }

    #modal{
        display:none;
        background-color: white;
        width: 500px;
        height: 590px;
        position:absolute;
        z-index: 2;
        margin-left: 17%;
        margin-top: -6%;
        font-size: 14px;
    }
    #modal input[type=text]{
        font-size: 14px;
    }

    #text{
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 50px;
        color: white;
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
    }
    #header{
        font-size: 24px;
        margin-top: 1%;
        text-align: center;
        font-family: "Comic Sans MS", cursive, sans-serif;
    }
    #view-form{
        margin: 1%;
    }
</style>
<div id="overlay"></div>

        <div id="modal">
            <div id="header">Member Details</div>
            <hr>
            <form action="" method="post" id="view-form">
                <label for="fname" class="labels"> Firstname</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" disabled/>
                <label for="fname" class="labels"> Surname</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Surname" disabled/>
                <label for="fname" class="labels"> Cell no.</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Cell Phone" disabled/>
                <label for="fname" class="labels"> Bank name</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Bank Name" disabled/>
                <label for="fname" class="labels"> Account holder</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Account Holder" disabled/>
                <label for="fname" class="labels"> Account no.</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Account no." disabled/>
                <label for="fname" class="labels"> Status</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Status" disabled/>
                <input type="button" class="form-control btn-success" name="fname" id="fname" value="Edit" disabled/>
            </form>
        </div>
   