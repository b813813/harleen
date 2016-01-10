# Harleen

## Todo
### Play
- [x] Create Play store method.
- [x] Create authorization for Play.
- [x] Change how update reason up in Play edit form.
- [ ] Complete delete Play process.
- [ ] When updating, update all linked resources GCF.
- [ ] Add success message when done deleting.
- [ ] Use save transaction to database operation.
- [ ] Disable timstamps, assign these columns manually.

### Others
- [x] Find way to bind nice name with multiple model while error.
- [ ] Compress fat assets.
- [ ] Add intermediate table attributes of contractor_working_area.

### Data Migration
- [ ] Insert rps_year for each migrated resources.
- [ ] Migrate terrain with miles to km in seeder.
- [ ] Insert updated_at with value same as created_at.

### Log
- [ ] Log query events.

### Before Production
- [ ] Move all seeder to developer database feature only.

## Issues
- FIXED Because InitialViewShare set to global, cause unauthenticated user error when login.
- FIXED Mutator Play rps_year still not working.
- Delete play process create another same record.
- FIXED gcf_id on play not saved.

## Changelog 0.1
- Changed database name to 'sumberdaya'.
- Added create_initial_tables migration.
- Changed DatabaseSeeder to add test user.
- Added GeneralSeeder for general information about administration.
- Added ResourcesSeeder for Play, Lead, and Prospect.
- Changed timezone to Asia/Jakarta.
- Added old database config with name 'oldrps'.
- Removed default user and password migration.
- Removed Play ID on tested well zone, changed with formation name.
- Added tested well and tested well zone migration.
- Added discovery tested well zone migration.
- Added Semantic UI for CSS framework.
- Added getLogin in AuthController.
- Added SKK Migas favicon.ico, logo, and RTOR.
- Added login.blade.php view template.
- Added postLogin and getLogout in AuthController.
- Changed model User tables to 'user'.
- Added master.blade.php as main layout.
- Added AdministratorController and administrator index layout.
- Added DeveloperController and developer index layout
- Removed Semantic UI, go for Bootstrap.
- Fixed footer with Bootstrap.
- Fixed footer height size.
- Changed body background color to be darker.

## Changelog 0.2
- Upgraded to Laravel 5.2.
- Added ContractorController.
- Added recapitulation migration in initial tables.
- Changed on Lead and drillable seeder to use nameCleaner on closure name.
- Added nullable on Lead and Drillable migration structure name.
- Added DatabaseController and related views.
- Added AccountController and related views.
- Added helpers.php file.
- Changed RedirectIfAuthenticated middleware to check for role.
- Added RoutesAuthenticate to authenticate in routes level.
- Applied RoutesAuthenticate middleware to DeveloperController.
- Added account/reset/all route to AccountController @ resetAllUserPass.
- Added ResourcesController and related views.
- Added test administrator user in DatabaseSeeder.
- Added resources table in Resources views.
- Added jQuery DataTables library.
- Added Quinzel namespace to hold any business related logic.
- Added Resources.php in Quinzel.
- Updated ResourcesController index to get montageTable from Resources.php.
- Changed montagaTable to workingAreaTotal and added basinSeparator param.
- Added icon on navbar menu.
- Added BlockUi library.
- Fixed resetAllUserPass resetting developer and administrator user password.
- Added POST route to account/reset/all.
- Moved test user after GeneralSeeder and ResourcesSeeder.
- Added Maatwebsite/Excel to support Excel.
- Added exportNewUserPass in AccountController to download newly created username and password and bind with account/reset/all/export.
- Added summaryWorkingArea in ResourcesController act as montage for working area.

## Changelog 0.3
- Updated summary working area page.
- Deleted hist_working_area table.
- Created re_play table.
- Created re_lead table.
- Added helper function createNavTitle.
- Added PlayController.
- Added helper function createPlayName.
- Added Play Index page.
- Added only Pertamina EP that show basin column for any resources index.
- Added Play create action and views.
- Added GCF shared form.
- Added model WorkingArea, Contractor, Play, Gcf.
- Added PlayRepository in Quinzel.
- Changed all deleted_at columns with native migration method softDeletes.
- Added aaSorting to retain default sort order from server.
- Added index method in PlayRepository.
- Added LaravelCollective html package.
- Created shared.components directory to hold any custom form components.
- Changed required english error message.
- Created PlayFormRequest.
- Added isRequired in Request base class.

## Changelog 0.4
- Added form components registration in boot method.
- Created text.blade.php form components.
- Created textarea.blade.php form components.
- Created select.blade.php form components.
- Created number.blade.php form components.
- Added view sugar components in shared.
- Added Province model.
- Added local driver '2011'.
- Added helper function actionName.
- Added helper function controllerName.
- Created Formation model.
- Exported GCF class group from Fenrir.
- Created twoSelect.blade.php form components.
- GCF form now will check if controller name is Play or not.
- Web .htaccess compress.
- Fixed Dynamic options pathway multiple migrations.
- Finished GCF form.
- Added dev.js debugging tools.
- Removed glyphicon from navbar menu.
- Added sys_year table to hold rps year record.
- Created views.card to for card-type partial views.
- Added helper function getActiveRPSYear.
- Created SystemController to manage RPS year, notification, and other system functionality as well.
- Changed how field addressed as array of data.
- Added store method in PlayController.
- Fixed error message not shown when using array input.
- Finished create and update Play features.
- Added order number in Play index.
- Changed PlayRepository collections sort data.
- Finished view Play features.
- Created error page for 404.
- Created authorization for Play update and view.
- Changed play route into group and call middlware auth before.
- Changed mostly all play controller action.
- Created InitialViewShare middleware to initialize any view share method.
- Fixed unauthenticate user can view all routes.
- Added incrementing to false for any table that not used integer as PK.
- Changed created_at and updated_at to use nullableTimestamps.

## Changelog 0.5
- Moved all alert and modal to shared/notification.
- Added form.js to help form functionality in general.
- Changed yield for javascript and css to stack.
- Added Laracasts/Javascript ~2.0.
- Fixed account index javascript not send csrf_token.
- Added delete modal detail for Play.
- Changed update_reason form field to show only when action name is 'edit'.
- Added PlayRepository with find resources.
- Created lang/en/crud.php to write additional long text within CRUD operation.
- Use transaction for store, update, and destroy.
- Deleted column is_editing in database migration.
- Changed 404 and 503 pages.