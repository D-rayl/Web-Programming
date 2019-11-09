import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { routes } from "./user-routing.module";
import { RouterModule } from "@angular/router";
import { UsersComponent } from "./users/users.component";
import { UserprofileComponent } from "./userprofile/userprofile.component";

@NgModule({
  imports: [CommonModule, RouterModule.forChild(routes)],
  declarations: [UsersComponent, UserprofileComponent]
})
export class UserModule {}
