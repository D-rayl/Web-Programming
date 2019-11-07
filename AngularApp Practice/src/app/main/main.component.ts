import { Component, OnInit } from "@angular/core";
import { apps } from "../apps";

@Component({
  selector: "app-main",
  templateUrl: "./main.component.html",
  styleUrls: ["./main.component.css"]
})
export class MainComponent implements OnInit {
  apps = apps;

  constructor() {}

  static scroll() {
    document
      .querySelector("")
      .scrollIntoView({ behavior: "smooth", block: "center" });
  }

  ngOnInit() {}
}
