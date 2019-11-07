import { Component } from "@angular/core";
import { Service } from "src/services";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent {
  ServerName = "Apollo";
  ServerPID = 11;
  ServerStatus = "Offline";
  StatusFlag = false;
  buttonDisabled = true;
  YourName = "";
  NoName = false;
  flag = true;
  count = 0;

  public people = [];
  public errorMsg;

  paraList = [
    "This is the first paragraph",
    "And here comes the second one",
    "For the third, there wont be much more",
    "Number four is honing in the the last paragraph",
    "And this is it number five"
  ];
  nameList = ["John", "Gianni", "Psy"];

  constructor(private _peopleService: Service) {
    setTimeout(() => {
      this.buttonDisabled = false;
    }, 2500);
  }

  ngOnInit() {
    this._peopleService
      .getPeople()
      .subscribe(
        data => (this.people = data),
        error => (this.errorMsg = error)
      );
  }

  next() {
    this.count++;
    if (this.count === 5) {
      this.count = 0;
    }
  }
  checkCount() {
    if (this.count === 4) {
      return true;
    }
    return false;
  }

  add() {
    this.nameList.push(this.YourName);
  }

  getColor() {
    if (this.flag === true) {
      return "green";
    }
    return "red";
  }
  setFlag() {
    this.flag = !this.flag;
  }

  textChanged() {
    if (this.YourName === "") {
      return (this.NoName = true);
    }
    return (this.NoName = false);
  }

  resetHandler() {
    this.YourName = "";
    this.NoName = true;
  }

  toggleStatus() {
    this.StatusFlag = !this.StatusFlag;
    if (this.StatusFlag === true) {
      this.ServerStatus = "Online";
    } else {
      this.ServerStatus = "Offline";
    }
    return this.ServerStatus;
  }
}
