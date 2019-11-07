import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { NgModel } from "@angular/forms";
import { DepartmentListComponent } from "./department-list/department-list.component";
import { EmployeeListComponent } from "./employee-list/employee-list.component";
import { PageNotFoundComponent } from "./page-not-found/page-not-found.component";
import { DepartmentDetailsComponent } from "./department-details/department-details.component";
import { DepartmentContactComponent } from "./department-contact/department-contact.component";
import { DepartmentOverviewComponent } from "./department-overview/department-overview.component";

const routes: Routes = [
  //Default route
  { path: "", redirectTo: "/departments", pathMatch: "full" },
  { path: "departments", component: DepartmentListComponent },
  { path: "employees", component: EmployeeListComponent },
  {
    path: "departments/:id",
    component: DepartmentDetailsComponent,
    children: [
      { path: "overview", component: DepartmentOverviewComponent },
      { path: "contact", component: DepartmentContactComponent }
    ]
  },
  //Wildcard for unavailable pages, route must be last in the list
  { path: "**", component: PageNotFoundComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
export const routingComponents = [
  DepartmentListComponent,
  EmployeeListComponent,
  DepartmentDetailsComponent,
  DepartmentOverviewComponent,
  DepartmentContactComponent,
  PageNotFoundComponent
];
