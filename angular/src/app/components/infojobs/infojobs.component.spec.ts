import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InfojobsComponent } from './infojobs.component';

describe('InfojobsComponent', () => {
  let component: InfojobsComponent;
  let fixture: ComponentFixture<InfojobsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InfojobsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InfojobsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
