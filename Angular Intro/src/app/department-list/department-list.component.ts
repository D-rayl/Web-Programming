import { Component, OnInit } from "@angular/core";
import { Router, ActivatedRoute, ParamMap } from "@angular/router";

@Component({
  selector: "app-department-list",
  template: `
    <h3>Department List</h3>
    <ul class="item">
      <li
        (click)="onSelect(department)"
        [class.selected]="highlightSelected(department)"
        *ngFor="let department of departments"
      >
        <span class="badge">{{ department.id }}</span> {{ department.name }}
      </li>
    </ul>
  `,
  styles: ["li.selected {background-color:rgba(86,176,108,1)}"]
})
export class DepartmentListComponent implements OnInit {
  constructor(private router: Router, private route: ActivatedRoute) {}

  selectedId;
  departments = [
    { id: 1, name: "Angular" },
    { id: 2, name: "Node" },
    { id: 3, name: "MongoDB" },
    { id: 4, name: "Ruby" },
    { id: 5, name: "Bootstrap" }
  ];
  ngOnInit() {
    this.route.paramMap.subscribe((param: ParamMap) => {
      this.selectedId = parseInt(param.get("id"));
    });
  }

  highlightSelected(department) {
    return department.id === this.selectedId;
  }

  onSelect(department) {
    //Absolute Path
    //this.router.navigate(["/department", department.id]);

    //Relative Path
    this.router.navigate([department.id], { relativeTo: this.route });
  }
}
