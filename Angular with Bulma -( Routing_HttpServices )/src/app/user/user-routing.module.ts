import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { UsersComponent } from "./users/users.component";
import { UserprofileComponent } from "./userprofile/userprofile.component";

export const routes: Routes = [
  {
    path: "",
    component: UsersComponent
  },
  {
    path: ":username",
    component: UserprofileComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutingModule {}
