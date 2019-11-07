import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";
import { FormsModule } from "@angular/forms";
import { HttpClientModule } from "@angular/common/http";
import { AppComponent } from "./app.component";
import { Service } from "../services";
import { AppRoutingModule, routingComponents } from "./app-routing.module";
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { DepartmentDetailsComponent } from './department-details/department-details.component';
import { DepartmentOverviewComponent } from './department-overview/department-overview.component';
import { DepartmentContactComponent } from './department-contact/department-contact.component';

@NgModule({
  declarations: [AppComponent, routingComponents, PageNotFoundComponent, DepartmentDetailsComponent, DepartmentOverviewComponent, DepartmentContactComponent],
  imports: [BrowserModule, FormsModule, HttpClientModule, AppRoutingModule],
  providers: [Service],
  bootstrap: [AppComponent]
})
export class AppModule {}
