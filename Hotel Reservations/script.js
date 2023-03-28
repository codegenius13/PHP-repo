(function () {
    "use strict";
    window.addEventListener("load", function () {
        // RESERVED ROOMS
        /*var reservedRooms = {
            record1: {
                room: "bed3",
                owner: {
                    fname: "Joe",
                    lname: "Smith"
                }
            },
            record2: {
                room: "bed4",
                owner: {
                    fname: "Joe",
                    lname: "Smith"
                }
            },
            record3: {
                room: "bed5",
                owner: {
                    fname: "Joe",
                    lname: "Smith"
                }
            },
            record4: {
                room: "bed6",
                owner: {
                    fname: "Joe",
                    lname: "Smith"
                }
            }
        };*/
        var reservedRooms = {
            record1: {
                room: "bed0",
                owner: {
                    fname: "Joe",
                    lname: "Smith"
                }
            }
        }
        for(const key in reservedRooms) {
            if (reservedRooms.hasOwnProperty(key)) {
                const obj = reservedRooms[key];
                document.getElementById(obj.room).className = "reserve";
                document.getElementById(obj.room).innerHTML = 'Reserved';
            }
        }
        // END RESERVED ROOMS
        // SELECTING ROOM FOR RESERVATIONS
        var selectRooms = [];
        var rooms = document.querySelectorAll(".submit");
        rooms.forEach((room) => {
            room.addEventListener("click", function (event) {
                event.preventDefault();
                roomSelectionProcess(room.id);
            });
        });
        function roomSelectionProcess(thisRoom) {
            if (!document.getElementById(thisRoom).classList.contains("reserve")) {
                var index = selectRooms.indexOf(thisRoom);
                if (index > -1) {
                    selectRooms.splice(index, 1);
                    document.getElementById(thisRoom).className = 'submit';
                }
                else {
                    selectRooms.push(thisRoom);
                    document.getElementById(thisRoom).className = "sure";
                }
                manageConfirmForm();
            }  
        };
        // END SELECTING ROOM FOR RESERVATIONS
        // EVENT LISTENER FOR THE RESERVE BUTTON TO OPEN FORM
            document.getElementById('reserve').addEventListener("click", function (event) {
                document.querySelector(".form").style.display = "block";
                event.preventDefault(); 
            });
        // END EVENT LISTENER FOR THE RESERVE BUTTON TO OPEN FORM
    
        // EVENT LISTENER FOR THE RESERVE BUTTON TO CLOSE FORM
            document.getElementById("cancel").addEventListener("click", function (event) {
                document.querySelector(".form").style.display = "none"
                event.preventDefault();
        });
      // END EVENT LISTENER FOR THE RESERVE BUTTON TO CLOSE FORM
      // RESERVATION CONFIMATION FORM 
      function manageConfirmForm() {
            if (selectRooms.length > 0) {
                document.getElementById("confirmres").style.display = "block";
                if (selectRooms.length === 1) {
                    document.getElementById("selectedrooms").innerHTML = `You have selected seat ${selectRooms[0]}`;
                }
                else {
                let roomsString = selectRooms.toString();
                roomsString = roomsString.replace(/,/g , ",");
                roomsString = roomsString.replace(/,(?=[^,]*$)/ , 'and');
                document.getElementById("selectedrooms").innerHTML = `You have selected some seats ${roomsString}`;
                }
            }
            else {
                document.getElementById("confirmres").style.display = "none";
                document.getElementById("selectedrooms").innerHTML = 
                'You need to select some seats to reserve.<br><a href="#" id="error">Close</a> this dialog box and pick at least one seat.';
                document.getElementById("error").addEventListener("click", function () {
                document.getElementById("resform").style.display = "none"; 
                });
            }
        }
        manageConfirmForm();
        // END RESERVATION CONFIMATION FORM 
        // PROCESSING RESERVATIONS
        document.getElementById("confirmres").addEventListener("submit", function (event) {
            event.preventDefault();
            processReservation();
        });
        function processReservation() {
            const hardCodeRecords = Object.keys(reservedRooms).length;
            const fname = document.getElementById("fname").value;
            const lname = document.getElementById("lname").value;
            let counter = 1;
            let nextRecord = "";
            selectRooms.forEach((thisRoom) => {
                document.getElementById(thisRoom).className = "reserve";
                document.getElementById(thisRoom).innerHTML = "Reserved";
                nextRecord = `record${hardCodeRecords + counter}`;
                reservedRooms [nextRecord] = {
                    room:thisRoom,
                    owner: {
                        fname:fname,
                        lname:lname
                    }
                }
                counter++;
            });
            document.querySelector(".form").style.display = "none";
            selectRooms = [];
            manageConfirmForm();
        }
        // END PROCESSING RESERVATIONS
    });
})();