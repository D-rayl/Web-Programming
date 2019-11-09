import { Component, OnInit } from "@angular/core";
import { HttpService } from "../../http.service";

@Component({
  selector: "app-users",
  templateUrl: "./users.component.html",
  styleUrls: ["./users.component.scss"]
})
export class UsersComponent implements OnInit {
  users: Object;
  constructor(private httpService: HttpService) {}

  ngOnInit() {
    this.users = this.httpService.getUsers();
  }
}
