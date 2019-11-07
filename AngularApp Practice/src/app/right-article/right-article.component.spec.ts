import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RightArticleComponent } from './right-article.component';

describe('RightArticleComponent', () => {
  let component: RightArticleComponent;
  let fixture: ComponentFixture<RightArticleComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RightArticleComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RightArticleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
