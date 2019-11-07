import { Component, OnInit } from "@angular/core";
import { apps } from "../apps";
import { MainComponent } from "../main/main.component";

@Component({
  selector: "app-left-navbar",
  templateUrl: "./left-navbar.component.html",
  styleUrls: ["./left-navbar.component.css"]
})
export class LeftNavbarComponent implements OnInit {
  apps = apps;

  constructor() {}

  ngOnInit() {}
}
