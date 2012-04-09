# PyroStreams Field Types

This is a small collection of PyroStreams Field Types available for free

## Field Types

**Markdown**
Converts Markdown to HTML

**PyroNav**
Allows you to reuse PyroNav sections in streams

**_Template**
Gives you a starting point for creating a new field type


## Installation

### PyroCMS 2.1

Starting with PyroCMS 2.1, PyroStreams uses Streams Core instead. This moves the default field types to the core folder. When you want to have additional field types, you can move the field type folder to either `/addons/<site_ref>/field_types/` or `/addons/shared_addons/field_types`.

### PyroCMS 2.0

This version of PyroCMS does not use Streams Core so you will be placing field types with the streams module in either `/addons/<site_ref>/modules/streams/field_types/` or `/addons/shared_addons/modules/streams/field_types/` depending where you have streams located.

### PyroCMS 1.3.2 with PyroStreams 1.1.2 and below

With the older versions of PyroCMS, the field types were **not** stored in their own folder. Every field type will be in `/addons/<site_ref>/modules/streams/field_types/` or `/addons/shared_addons/modules/streams/field_types/`. Also, you really should upgrade to a newer version. It's much cooler now.