import { Component, OnInit } from "@angular/core";
import { AlertService } from "../alerts/services/alert.service";

@Component({
  selector: "app-top-navbar",
  templateUrl: "./top-navbar.component.html",
  styleUrls: ["./top-navbar.component.css"]
})
export class TopNavbarComponent implements OnInit {
  // Array for the drop down menu items
  public menuItems = [];
  constructor(private alertService: AlertService) {
    let k = 5;
    for (let i = 0; i <= 4; i++) {
      this.menuItems[i] = {
        id: i,
        menuTitle: "Drop Down" + (i + 1),
        items: []
      };

      for (let j = 0; j < k; j++) {
        var item = "Item " + (j + 1);

        this.menuItems[i].items[j] = item;
      }
      k++;
    }
  }

  ngOnInit() {}

  success(message: string) {
    this.alertService.clear();
    this.alertService.success(message);
  }
}
