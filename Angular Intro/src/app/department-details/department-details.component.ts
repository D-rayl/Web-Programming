import { Component, OnInit } from "@angular/core";
import { ActivatedRoute, Router, ParamMap } from "@angular/router";

@Component({
  selector: "app-department-details",
  template: `
    <h3>You have selected department id = {{ departmentId }}</h3>
    <p>
      <button (click)="showOverview()">Overview</button>
      <button (click)="showContactInfo()">Contact</button>
    </p>
    <router-outlet></router-outlet>
    <div>
      <button (click)="onSelect(false)">Previous</button>

      <button (click)="onSelect(true)">Next</button>

      <button (click)="back()">Back</button>
    </div>
  `,
  styles: ["div {border: 1px solid #777; background-color: #eef}"]
})
export class DepartmentDetailsComponent implements OnInit {
  constructor(private route: ActivatedRoute, private router: Router) {}

  public departmentId;
  public tmp;

  ngOnInit() {
    //Gets the id param from the route url
    //let id = parseInt(this.route.snapshot.paramMap.get("id"));
    //this.departmentId = id;
    this.route.paramMap.subscribe((param: ParamMap) => {
      let id = parseInt(param.get("id"));
      this.departmentId = id;
    });
  }
  onSelect(next) {
    if (next && this.departmentId < 5) {
      this.tmp = this.departmentId + 1;
    } else if (!next && this.departmentId > 1) {
      this.tmp = this.departmentId - 1;
    }

    //Work but not good
    let relativePath = this.route.url;
    this.router.navigate([relativePath, this.tmp]);
  }
  back() {
    //adding a prop to pass back
    let lastId = this.departmentId;
    //this.router.navigate(["/departments", { id: lastId }]);
    this.router.navigate(["../", { id: lastId }], { relativeTo: this.route });
  }

  showOverview() {
    this.router.navigate(["overview"], { relativeTo: this.route });
  }
  showContactInfo() {
    this.router.navigate(["contact"], { relativeTo: this.route });
  }
}
