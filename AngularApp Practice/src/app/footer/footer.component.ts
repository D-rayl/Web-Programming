import { Component, OnInit } from "@angular/core";

@Component({
  selector: "app-footer",
  templateUrl: "./footer.component.html",
  styleUrls: ["./footer.component.css"]
})
export class FooterComponent implements OnInit {
  menuItems = [
    {
      name: "menu 1",
      children: ["qwerty", "foo", "bar"]
    },
    {
      name: "menu 2",
      children: ["qwerty", "foo", "bar"]
    },
    {
      name: "menu 3",
      children: ["qwerty", "foo", "bar"]
    },
    {
      name: "menu 4",
      children: ["qwerty", "foo", "bar"]
    },
    {
      name: "menu 5",
      children: ["qwerty", "foo", "bar"]
    }
  ];
  constructor() {}

  ngOnInit() {}
}
